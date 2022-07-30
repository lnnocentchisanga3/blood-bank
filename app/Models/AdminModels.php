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
		$this->$db = \Config\Database::connect();
	}


	public function hivNum()
	{
		$builder = $this->$db->table('donors');

		$builder->select("hiv");
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

	public function hbvNum()
	{
		$builder = $this->$db->table('donors');

		$builder->select("hbv");
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

	public function hcvNum()
	{
		$builder = $this->$db->table('donors');

		$builder->select("hcv");
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

	public function syphilisNum()
	{
		$builder = $this->$db->table('donors');

		$builder->select("syphilis");
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

	public function getDonors()
	{
	
	$query = $this->$db->query("SELECT * FROM `donors` GROUP BY date_of_next_donation ORDER BY date_of_next_donation ASC");

	$result = $query->getResult();

	if (count($result) == null) {
		return false;
	}else{
		return $result;
	}

	}

	/*public function getStatistcs()
	{
		$output = "";
$query = $this->$db->query("SELECT * FROM donors GROUP BY site");
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