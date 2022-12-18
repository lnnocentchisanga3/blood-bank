<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * 
 */
class AdminModels extends Model
{
	public $db;
	
	function __construct()
	{
		$this->db = \Config\Database::connect();
	}


	public function hivNum($hospital_id,$year)
	{
		$builder = $this->db->table('donations');
		$builder->join('donors','donor_id');
		$builder->select("hiv");
		$builder->where('hospital_id',$hospital_id);
		$builder->where('year_added',$year);
		$builder->where('hiv',22);

		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return count($result->getResultArray());
			}
		}else{
			return false;
		}
	}

	public function hbvNum($hospital_id,$year)
	{
		$builder = $this->db->table('donations');
		$builder->join('donors','donor_id');
		$builder->select("hbv");
		$builder->where('hospital_id',$hospital_id);
		$builder->where('year_added',$year);
		$builder->where('hbv',22);

		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return count($result->getResultArray());
			}
		}else{
			return false;
		}
	}


	public function hcvNum($hospital_id,$year)
	{
		$builder = $this->db->table('donations');
		$builder->join('donors','donor_id');
		$builder->select("hcv");
		$builder->where('hospital_id',$hospital_id);
		$builder->where('year_added',$year);
		$builder->where('hcv',22);

		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return count($result->getResultArray());
			}
		}else{
			return false;
		}
	}

	public function syphilisNum($hospital_id,$year)
	{
		$builder = $this->db->table('donations');
		$builder->join('donors','donor_id');
		$builder->select("syphilis");
		$builder->where('hospital_id',$hospital_id);
		$builder->where('year_added',$year);
		$builder->where('syphilis',22);

		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return count($result->getResultArray());
			}
		}else{
			return false;
		}
	}

	public function Discards($hospital_id,$year)
	{
		$builder = $this->db->table('donations');
		$builder->join('donors','donor_id');
		$builder->select("comment");
		$builder->where('hospital_id',$hospital_id);
		$builder->where('year_added',$year);
		$builder->where('comment','Discard');

		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return count($result->getResultArray());
			}
		}else{
			return false;
		}
	}


	public function getDonors($hospital_id)
	{
	
	$query = $this->db->query("SELECT * FROM donation_sites INNER JOIN donations ON donations.site_id=donation_sites.site_id WHERE donation_sites.hospital_id='$hospital_id' GROUP BY donation_site_name ORDER BY date_of_donation ASC");

	$result = $query->getResult();

	if (count($result) == null) {
		return $hospital_id;
	}else{
		return $result;
	}

	}

	/*public function getStatistcs()
	{
		$output = "";
$query = $this->db->query("SELECT * FROM donors GROUP BY site");
              $output .= "<script>
            $(document).ready(function(){
                var barChartData = {";
               $output .= "labels: [";
                while ( $row  = $query->getResultArray()) {
               $output .= "'".substr($row["site"], 0,10)."',";
                    }
               $output .= " ],";
               $output .= "datasets: [{
                    label: 'Donors 1',
                    backgroundColor: 'rgba(0, 158, 251, 0.5)',
                    borderColor: 'rgba(0, 158, 251, 1)',
                    borderWidth: 1,";
                  $output .= "data: ["; 
        $query = mysqli_query($conn, "SELECT COUNT(sample_id) FROM donors GROUP BY site");
           while ( $row  = $query->getResultArray()) {
               $output .= $row['COUNT(sample_id)'].",";
                }
                  $output .= ",]";
               $output .= "}
                ]
            };

            var ctx = document.getElementById('bargraph').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    }
                }
            });
            });
        </script>";


        return $output;
                  
	}*/

}

?>