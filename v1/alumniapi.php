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
		$query = 'SELECT pe.*'
		. ', ti.description AS ti_description'
		. ', ge.description AS ge_description'
		. ' FROM alumni_personal AS pe'
		. ' LEFT JOIN `alumni_titles` AS ti ON ti.alumni_titlescode = pe.titles'
		. ' LEFT JOIN `gender` AS ge ON ge.gendercode = pe.gender'
		. ' WHERE pe.verified = 1 AND pe.show_data = 1'
		. ($params['alumni_personalcode'] == ''? '' : ' AND pe.alumni_personalcode = \'' . $this->db->real_escape_string($params['alumni_personalcode']) . '\'')
		. ' ORDER BY pe.alumni_personalcode'
		;		
		$list = array();
		$result = $this->db->query($query);
		while ($row = $result->fetch_assoc())
		{	 
			// get all the external jobs
			$array_aux = array();
			$query2 = 'SELECT ej.*'
			. ', se.description AS external_job_sectors_description'
			. ', po.description AS external_job_positions_description'
			. ', ty.description AS external_job_position_types_description'
			. ' FROM alumni_external_jobs AS ej'
			. ' LEFT JOIN `alumni_external_job_sectors` AS se ON se.alumni_external_job_sectorscode = ej.external_job_sectors'
			. ' LEFT JOIN `alumni_external_job_positions` AS po ON po.alumni_external_job_positionscode = ej.external_job_positions'
			. ' LEFT JOIN `alumni_job_position_types` AS ty ON ty.alumni_job_position_typescode = po.job_position_types'
			. ' WHERE ej.personal = \'' . $row['alumni_personalcode'] . '\''
			. ' ORDER BY ej.start_date'
			;
			$result2 = $this->db->query($query2);
			while ($row2 = $result2->fetch_assoc()) {
				$array_aux[] = $row2;
			}
			$row['external_jobs'] = $array_aux;

			// get all the irb jobs
			$array_aux = array();
			$query3 = 'SELECT ij.*'
			. ', po.description AS irb_job_positions_description'
			. ', ty.description AS irb_job_position_types_description'
			. ' FROM alumni_irb_jobs AS ij'
			. ' LEFT JOIN `alumni_irb_job_positions` AS po ON po.alumni_irb_job_positionscode = ij.irb_job_positions'
			. ' LEFT JOIN `alumni_job_position_types` AS ty ON ty.alumni_job_position_typescode = po.job_position_types'
			. ' WHERE ij.personal = \'' . $row['alumni_personalcode'] . '\''
			. ' ORDER BY ij.start_date'
			;
			$result3 = $this->db->query($query3);
			while ($row3 = $result3->fetch_assoc()) {
				$array_aux[] = $row3;
			}
			$row['irb_jobs'] = $array_aux;

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
			. ', nationality_2'
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
			. ', \'' . $this->db->real_escape_string($params['nationality_2']) .'\''
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
		$query = 'SELECT alumni_titlescode, description'
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
		$query = 'SELECT nationalitycode, description'
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
		$query = 'SELECT gendercode, description'
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
		$query = 'SELECT countrycode, description'
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
		$query = 'SELECT alumni_communicationscode, description'
		. ' FROM alumni_communications AS ac'
		. ' WHERE ac.deleted = \'\''
		. ' ORDER BY ac.description'
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
		$query = 'SELECT alumni_external_job_positionscode, description'
		. ' FROM alumni_external_job_positions AS jp'
		. ' WHERE jp.deleted = \'\''
		. ' ORDER BY jp.description'
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
	 * Get the list of external jobs sectors on JSON format
	 * 
	 * @param none
	 * @return list of data
	*/
	function get_external_jobs_sectors()
	{
		$query = 'SELECT alumni_external_job_sectorscode, description'
		. ' FROM alumni_external_job_sectors AS js'
		. ' WHERE js.deleted = \'\''
		. ' ORDER BY js.description'
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
