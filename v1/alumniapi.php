<?php
/**
 * API class
 * @author R. Bartolome
 * @version 2015-02-06 First version
 */

class alumniapi
{
	private $db; // database

	/**
	 * Constructor - open DB connection
	 * 
	 * @param none
	 * @return database
	 */
	function __construct()
	{
		$conf = json_decode(file_get_contents('configuration.json'), TRUE);
		$this->db = new mysqli($conf["host"], $conf["user"], $conf["password"], $conf["database"]); // development	
	}

	/**
	 * Destructor - close DB connection
	 * 
	 * @param none
	 * @return none
	 */
	function __destruct()
	{
		$this->db->close();
	}
	
	/**
	 * Get the list of alumni
	 * 
	 * @param none or user id
	 * @return list of data
	 */
	function get($params)
	{		
		// get all codes in database
		$query = 'SELECT pe.alumni_personalcode AS alumni_personalcode'
		. ', pe.titles AS titles'
		. ', pe.firstname AS firstname'
		. ', pe.surname AS surname'
		. ', pe.irb_surname AS irb_surname'
		. ', pe.gender AS gender'
		. ', pe.nationality AS nationality'
		. ', pe.nationality_2 AS nationality_2'
		. ', pe.birth AS birth'
		. ', pe.email AS email'
		. ', pe.url AS url'
		. ', pe.facebook AS facebook'
		. ', pe.linkedin AS linkedin'
		. ', pe.twitter AS twitter'
		. ', pe.keywords AS keywords'
		. ', pe.biography AS biography'
		. ', pe.awards AS awards'
		. ', pe.ORCIDID AS ORCIDID'
		. ', pe.researcherid AS researcherid'
		. ', pe.pubmedid AS pubmedid'	
		. ' FROM alumni_personal AS pe'
		. ' WHERE pe.verified = 1'
		. ' AND pe.show_data = 1'
		. ' AND pe.deleted = \'\''
		. ($params['alumni_personalcode'] == ''? '' : ' AND pe.alumni_personalcode = \'' . $this->db->real_escape_string($params['alumni_personalcode']) . '\'')
		. ' ORDER BY pe.alumni_personalcode'
		;			
		$list = array();
		$result = $this->db->query($query);
		while ($row = $result->fetch_assoc())
		{	 
			// 2015-05-29 convert
			$row = array_map('utf8_encode', $row);
			
			// get all the external jobs
			$array_aux = array();
			$query2 = 'SELECT ej.current AS current'
			. ', ej.start_date AS start_date'
			. ', ej.end_date AS end_date'
			. ', ej.external_job_positions AS external_job_positions'
			. ', ej.comments AS comments'
			. ', ej.external_job_sectors AS external_job_sectors'
			. ', ej.institution AS institution'
			. ', ej.address AS address'
			. ', ej.postcode AS postcode'
			. ', ej.city AS city'
			. ', ej.country AS country'
			. ', ej.telephone AS telephone'
			. ' FROM alumni_external_jobs AS ej'
			. ' WHERE ej.personal = \'' . $row['alumni_personalcode'] . '\''
			. ' AND ej.deleted = \'\''
			. ' ORDER BY ej.start_date'
			;
			$result2 = $this->db->query($query2);
			while ($row2 = $result2->fetch_assoc()) {
				$array_aux[] = $row2;
			}
			$row['external_jobs'] = $array_aux;

			// get all the irb jobs
			$array_aux = array();
			$query3 = 'SELECT ij.start_date AS start_date'
			. ', ij.end_date AS end_date'
            . ', un1.description AS unit1_description'
            . ', un2.description AS unit2_description'
            . ', rg1.description AS research_group1_description'
            . ', rg2.description AS research_group2_description'
			. ', po.description AS irb_job_position'
			. ' FROM alumni_directory_data AS ij'
			. ' LEFT JOIN `unit` AS un1 ON ij.unit = un1.unitcode'
			. ' LEFT JOIN `unit` AS un2 ON ij.unit_2 = un2.unitcode'
			. ' LEFT JOIN `research_group` AS rg1 ON ij.research_group = rg1.research_groupcode'
			. ' LEFT JOIN `research_group` AS rg2 ON ij.research_group_2 = rg2.research_groupcode'
            . ' LEFT JOIN `alumni_irb_job_positions` AS po ON po.alumni_irb_job_positionscode = ij.irb_job_positions'
			. ' WHERE ij.personal = \'' . $row['alumni_personalcode'] . '\''
			. ' AND ij.deleted = \'\''
			. ' ORDER BY ij.start_date'
			;
			$result3 = $this->db->query($query3);
			while ($row3 = $result3->fetch_assoc()) {
				$array_aux[] = $row3;
			}
			$row['irb_jobs'] = $array_aux;
			
			// get all the communications
			$array_aux = array();
			$query4 = 'SELECT co.alumni_communicationscode AS alumni_communicationscode'
			. ' FROM alumni_personal_communications AS co'
			. ' WHERE co.alumni_personalcode = \'' . $row['alumni_personalcode'] . '\''
			. ' ORDER BY co.alumni_communicationscode'
			;
			$result4 = $this->db->query($query4);
			while ($row4 = $result4->fetch_assoc()) {
				$array_aux[] = $row4;
			}
			$row['communications'] = $array_aux;
				
			// add new element to the list
			$list[] = $row;
		}
		
		// all ok
		return $list;
		
	}

	/**
	 * Save alumni data on the db
	 * return: true or false
	 * 
	 * @param user data
	 * @return true, false
	 */
	function save($params)
	{		
		// save personal data
		if ($params['alumni_personalcode'] == '') // insert or update?
		{	
			// set the unique id for the user
			$params['alumni_personalcode'] = uniqid('', TRUE);
			
			$query = 'INSERT INTO alumni_personal ('
			. 'alumni_personalcode'
			. ', titles'
			. ', firstname'
			. ', surname'
			. ', irb_surname'
			. ', gender'
			. ', nationality'
			. ($params['nationality_2'] == ''? '' : ', nationality_2')			
			. ', birth'
			. ', email'
			. ', url'
			. ', facebook'
			. ', linkedin'
			. ', twitter'
			. ', keywords'
			. ', biography'
			. ', awards'
			. ', ORCIDID'
			. ', researcherid'
			. ', pubmedid'
			. ', show_data'
			. ' )'
			. ' VALUES ('
			. '\'' . $this->db->real_escape_string($params['alumni_personalcode']) .'\''
			. ', \'' . $this->db->real_escape_string($params['titles']) .'\''
			. ', \'' . $this->db->real_escape_string($params['firstname']) .'\''
			. ', \'' . $this->db->real_escape_string($params['surname']) .'\''
			. ', \'' . $this->db->real_escape_string($params['irb_surname']) .'\''
			. ', \'' . $this->db->real_escape_string($params['gender']) .'\''
			. ', \'' . $this->db->real_escape_string($params['nationality']) .'\''
			. ($params['nationality_2'] == ''? '' : ', \'' . $this->db->real_escape_string($params['nationality_2']) .'\'')			
			. ', \'' . $this->db->real_escape_string($params['birth']) .'\''
			. ', \'' . $this->db->real_escape_string($params['email']) .'\''
			. ', \'' . $this->db->real_escape_string($params['url']) .'\''
			. ', \'' . $this->db->real_escape_string($params['facebook']) .'\''
			. ', \'' . $this->db->real_escape_string($params['linkedin']) .'\''
			. ', \'' . $this->db->real_escape_string($params['twitter']) .'\''
			. ', \'' . $this->db->real_escape_string($params['keywords']) .'\''
			. ', \'' . $this->db->real_escape_string($params['biography']) .'\''
			. ', \'' . $this->db->real_escape_string($params['awards']) .'\''
			. ', \'' . $this->db->real_escape_string($params['ORCIDID']) .'\''
			. ', \'' . $this->db->real_escape_string($params['researcherid']) .'\''
			. ', \'' . $this->db->real_escape_string($params['pubmedid']) .'\''
			. ', \'' . $this->db->real_escape_string($params['show_data']) .'\''
			. ' )'
			;
		} else {
			$query = 'UPDATE alumni_personal SET'
			. ' titles = \'' . $this->db->real_escape_string($params['titles']) .'\''
			. ', firstname = \'' . $this->db->real_escape_string($params['firstname']) .'\''
			. ', surname = \'' . $this->db->real_escape_string($params['surname']) .'\''
			. ', irb_surname = \'' . $this->db->real_escape_string($params['irb_surname']) .'\''
			. ', gender = \'' . $this->db->real_escape_string($params['gender']) .'\''
			. ', nationality = \'' . $this->db->real_escape_string($params['nationality']) .'\''
			. ', nationality_2 = \'' . $this->db->real_escape_string($params['nationality_2']) .'\''
			. ', birth = \'' . $this->db->real_escape_string($params['birth']) .'\''
			. ', email = \'' . $this->db->real_escape_string($params['email']) .'\''
			. ', url = \'' . $this->db->real_escape_string($params['url']) .'\''
			. ', facebook = \'' . $this->db->real_escape_string($params['facebook']) .'\''
			. ', linkedin = \'' . $this->db->real_escape_string($params['linkedin']) .'\''
			. ', twitter = \'' . $this->db->real_escape_string($params['twitter']) .'\''
			. ', keywords = \'' . $this->db->real_escape_string($params['keywords']) .'\''
			. ', biography = \'' . $this->db->real_escape_string($params['biography']) .'\''
			. ', awards = \'' . $this->db->real_escape_string($params['awards']) .'\''
			. ', ORCIDID = \'' . $this->db->real_escape_string($params['ORCIDID']) .'\''
			. ', researcherid = \'' . $this->db->real_escape_string($params['researcherid']) .'\''
			. ', pubmedid = \'' . $this->db->real_escape_string($params['pubmedid']) .'\''
			. ', show_data = \'' . $this->db->real_escape_string($params['show_data']) .'\''
			. ' WHERE '
			. 'alumni_personalcode = \'' . $this->db->real_escape_string($params['alumni_personalcode']) . '\''
			;
		}	
		if (!$this->db->query($query)) {
			return false;
		}
		print_r($params);
		return false;
		// save external jobs data
		if (isset($params['external_jobs']))
		{
			// remove old records before inserting new ones
			$query = 'DELETE FROM alumni_external_jobs'
			. ' WHERE personal = \'' . $this->db->real_escape_string($params['alumni_personalcode']) . '\''
			;
			if (!$this->db->query($query)) {
				return false;
			}
			
			// when the variable is empty this will not go through
			foreach ($params['external_jobs'] as $external_job)
			{
				// it is needed a unique code
				$alumni_external_jobscode = uniqid('', TRUE);	
				
				// insert data from the form
				$query = 'INSERT INTO alumni_external_jobs ('
				. 'alumni_external_jobscode'
				. ', personal'
				. ', start_date'
				. ', end_date'
				. ', external_job_positions'
				. ', comments'
				. ', external_job_sectors'
				. ', institution'
				. ', address'
				. ', postcode'
				. ', city'
				. ', country'
				. ', telephone'
				. ', current'			
				. ' )'
				. ' VALUES ('
				. '\'' . $alumni_external_jobscode .'\''
				. ', \'' . $this->db->real_escape_string($params['alumni_personalcode']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['star_date']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['end_date']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['external_job_positions']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['comments']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['external_job_sectors']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['institution']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['address']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['postcode']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['city']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['country']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['telephone']) .'\''
				. ', \'' . $this->db->real_escape_string($external_job['current']) .'\''
				. ' )'
				;	
				echo $query;
				break;		
				if (!$this->db->query($query)) {
					return false;
				}
			}
		}
		
		// save communications data
		if (isset($params['communications']))
		{
			// remove old records before inserting new ones
			$query = 'DELETE FROM alumni_personal_communications'
			. ' WHERE alumni_personalcode = \'' . $this->db->real_escape_string($params['alumni_personalcode']) . '\''
			;
			if (!$this->db->query($query)) {
				return false;
			}
			
			// when the variable is empty this will not go through
			foreach ($params['communications'] as $communication)
			{
				// insert data from the form
				$query = 'INSERT INTO alumni_personal_communications ('
				. 'alumni_personalcode'
				. ', alumni_communicationscode'
				. ' )'
				. ' VALUES ('
				. '\'' . $this->db->real_escape_string($communication['alumni_personalcode']) .'\''
				. ', \'' . $this->db->real_escape_string($communication['alumni_communicationscode']) .'\''
				. ' )'
				;			
				if (!$this->db->query($query)) {
					return false;
				}
			}
		}
		
		// all ok
		return true;
	}
	
	/**
	 * Get the list of titles on JSON format
	 * 
	 * @param none
	 * @return list of data
	 */
	function get_titles()
	{
		$query = 'SELECT at.alumni_titlescode AS alumni_titlescode'
		. ', at.description AS description'
		. ' FROM alumni_titles AS at'
		. ' WHERE at.deleted = \'\''
		. ' ORDER BY at.order_number'
		;
		$list = array();
		if ($result = $this->db->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}
	
	/**
	 * Get the list of nationalities on JSON format
	 * 
	 * @param none
	 * @return list of data
	 */
	function get_nationalities()
	{
		$query = 'SELECT na.nationalitycode AS nationalitycode'
		. ', na.description AS description'
		. ' FROM nationality AS na'
		. ' WHERE na.deleted = \'\''
		. ' ORDER BY na.description'
		;
		$list = array();
		if ($result = $this->db->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}

	/**
	 * Get the list of genders on JSON format
	 * 
	 * @param none
	 * @return list of data
	*/
	function get_genders()
	{
		$query = 'SELECT ge.gendercode AS gendercode'
		.', ge.description AS description'
		. ' FROM gender AS ge'
		. ' WHERE ge.deleted = \'\''
		. ' ORDER BY ge.description'
		;
		$list = array();
		if ($result = $this->db->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}

	/**
	 * Get the list of countries on JSON format
	 * 
	 * @param none
	 * @return list of data
	*/
	function get_countries()
	{
		$query = 'SELECT co.countrycode AS countrycode'
		.', co.description AS description'
		. ' FROM country AS co'
		. ' WHERE co.deleted = \'\''
		. ' ORDER BY co.description'
		;
		$list = array();
		if ($result = $this->db->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}

	/**
	 * Get the list of communications on JSON format
	 * 
	 * @param none
	 * @return list of data
	*/
	function get_communications()
	{
		$query = 'SELECT ac.alumni_communicationscode AS alumni_communicationscode'
		. ', ac.description AS description'
		. ', ac.order_number AS order_number'
		. ' FROM alumni_communications AS ac'
		. ' WHERE ac.deleted = \'\''
		. ' ORDER BY ac.order_number'
		;
		$list = array();
		if ($result = $this->db->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}

	/**
	 * Get the list of external jobs positions on JSON format
	 * 
	 * @param none
	 * @return list of data
	*/
	function get_external_jobs_positions()
	{
		$query = 'SELECT jp.alumni_external_job_positionscode AS alumni_external_job_positionscode'
		.', jp.description AS description'
		. ' FROM alumni_external_job_positions AS jp'
		. ' WHERE jp.deleted = \'\''
		. ' ORDER BY jp.order_number'
		;
		$list = array();
		if ($result = $this->db->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}

	

	/**
	 * Get the list of jobs position types on JSON format
	 *
	 * @param none
	 * @return list of data
	 */
	function get_jobs_position_types()
	{
		$query = 'SELECT pt.alumni_job_position_typescode AS alumni_job_position_typescode'
		. ', pt.description AS description'
		. ', pt.order_number AS order_number'
		. ' FROM alumni_job_position_types AS pt'
		. ' WHERE pt.deleted = \'\''
		. ' ORDER BY pt.order_number'
		;
		$list = array();
		if ($result = $this->db->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}

}
