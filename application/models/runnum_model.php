  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Runnum_model extends CI_Model {

    // Run number for EbookType
	public function getRunEtype(){
		$this->db->where('rnID' , 1);
		$result = $this->db->get('tbrunnumber')->row();
		return $result->rnprefix . sprintf("%08d", ($result->rnnumber +1));
	}

	public function updateRunEtype() {
		$rnnumber = $this->db->where('rnID' , 1)->get('tbrunnumber')->row()->rnnumber;
		$this->db->set( 'rnnumber', $rnnumber + 1);
		$this->db->where('rnID' , 1);
		return $this->db->update('tbrunnumber');
	}

	// run number for ScoreDiscount
	public function getScdiscount() {
		$this->db->where('rnID' , 2);
		$result = $this->db->get('tbrunnumber')->row();
		return $result->rnprefix . sprintf("%08d", ($result->rnnumber +1));
	}

	public function updateScdiscount() {
		$rnnumber = $this->db->where('rnID' , 2)->get('tbrunnumber')->row()->rnnumber;
		$this->db->set( 'rnnumber', $rnnumber + 1);
		$this->db->where('rnID' , 2);
		return $this->db->update('tbrunnumber');
	}

	// run number for SalesShare
	public function getSalesshare() {
		$this->db->where('rnID' , 3);
		$result = $this->db->get('tbrunnumber')->row();
		return $result->rnprefix . sprintf("%02d", ($result->rnnumber +1));
	}

	public function updateSalesshare() {
		$rnnumber = $this->db->where('rnID' , 3)->get('tbrunnumber')->row()->rnnumber;
		$this->db->set( 'rnnumber', $rnnumber + 1);
		$this->db->where('rnID' , 3);
		return $this->db->update('tbrunnumber');
	}

	// run number for MenuGroup
	public function getMenugroup() {
		$this->db->where('rnID' , 4);
		$result = $this->db->get('tbrunnumber')->row();
		return $result->rnprefix . sprintf("%02d", ($result->rnnumber +1));
	}

	public function updateMenugroup() {
		$rnnumber = $this->db->where('rnID' , 4)->get('tbrunnumber')->row()->rnnumber;
		$this->db->set( 'rnnumber', $rnnumber + 1);
		$this->db->where('rnID' , 4);
		return $this->db->update('tbrunnumber');
	}

	// run number for Menu
	public function getMenu() {
		$this->db->where('rnID' , 5);
		$result = $this->db->get('tbrunnumber')->row();
		return $result->rnprefix . sprintf("%02d", ($result->rnnumber +1));
	}

	public function updateMenu() {
		$rnnumber = $this->db->where('rnID' , 5)->get('tbrunnumber')->row()->rnnumber;
		$this->db->set( 'rnnumber', $rnnumber + 1);
		$this->db->where('rnID' , 5);
		return $this->db->update('tbrunnumber');
	}

	// run number for User
	public function getUser() {
		$this->db->where('rnID' , 6);
		$result = $this->db->get('tbrunnumber')->row();
		return $result->rnprefix . sprintf("%06d", ($result->rnnumber +1));
	}

	public function updateUser() {
		$rnnumber = $this->db->where('rnID' , 6)->get('tbrunnumber')->row()->rnnumber;
		$this->db->set( 'rnnumber', $rnnumber + 1);
		$this->db->where('rnID' , 6);
		return $this->db->update('tbrunnumber');
	}
}
?>
