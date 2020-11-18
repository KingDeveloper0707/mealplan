<?php
ini_set("memory_limit", "-1");
set_time_limit(-1);
include 'db_config.php';

$survey = array();

$survey['male']['total'] = 0;
$survey['male']['paid'] = 0;
$survey['male']['refunded'] = 0;

$survey['female']['total'] = 0;
$survey['female']['paid'] = 0;
$survey['female']['refunded'] = 0;

$survey['time_0']['total'] = 0;
$survey['time_0']['paid'] = 0;
$survey['time_0']['refunded'] = 0;

$survey['time_1']['total'] = 0;
$survey['time_1']['paid'] = 0;
$survey['time_1']['refunded'] = 0;

$survey['time_2']['total'] = 0;
$survey['time_2']['paid'] = 0;
$survey['time_2']['refunded'] = 0;

$survey['time_3']['total'] = 0;
$survey['time_3']['paid'] = 0;
$survey['time_3']['refunded'] = 0;

$survey['chicken']['total'] = 0;
$survey['chicken']['paid'] = 0;
$survey['chicken']['refunded'] = 0;

$survey['pork']['total'] = 0;
$survey['pork']['paid'] = 0;
$survey['pork']['refunded'] = 0;

$survey['beef']['total'] = 0;
$survey['beef']['paid'] = 0;
$survey['beef']['refunded'] = 0;

$survey['fish']['total'] = 0;
$survey['fish']['paid'] = 0;
$survey['fish']['refunded'] = 0;

$survey['bacon']['total'] = 0;
$survey['bacon']['paid'] = 0;
$survey['bacon']['refunded'] = 0;

$survey['no_meat']['total'] = 0;
$survey['no_meat']['paid'] = 0;
$survey['no_meat']['refunded'] = 0;

$survey['broccoli']['total'] = 0;
$survey['broccoli']['paid'] = 0;
$survey['broccoli']['refunded'] = 0;

$survey['mushroom']['total'] = 0;
$survey['mushroom']['paid'] = 0;
$survey['mushroom']['refunded'] = 0;

$survey['zuccini']['total'] = 0;
$survey['zuccini']['paid'] = 0;
$survey['zuccini']['refunded'] = 0;

$survey['cauliflower']['total'] = 0;
$survey['cauliflower']['paid'] = 0;
$survey['cauliflower']['refunded'] = 0;

$survey['asparagus']['total'] = 0;
$survey['asparagus']['paid'] = 0;
$survey['asparagus']['refunded'] = 0;

$survey['avocado']['total'] = 0;
$survey['avocado']['paid'] = 0;
$survey['avocado']['refunded'] = 0;

$survey['egg']['total'] = 0;
$survey['egg']['paid'] = 0;
$survey['egg']['refunded'] = 0;

$survey['nut']['total'] = 0;
$survey['nut']['paid'] = 0;
$survey['nut']['refunded'] = 0;

$survey['cheese']['total'] = 0;
$survey['cheese']['paid'] = 0;
$survey['cheese']['refunded'] = 0;

$survey['butter']['total'] = 0;
$survey['butter']['paid'] = 0;
$survey['butter']['refunded'] = 0;

$survey['coconut']['total'] = 0;
$survey['coconut']['paid'] = 0;
$survey['coconut']['refunded'] = 0;

$survey['brussel_sprout']['total'] = 0;
$survey['brussel_sprout']['paid'] = 0;
$survey['brussel_sprout']['refunded'] = 0;

$survey['activity_0']['total'] = 0;
$survey['activity_0']['paid'] = 0;
$survey['activity_0']['refunded'] = 0;

$survey['activity_1']['total'] = 0;
$survey['activity_1']['paid'] = 0;
$survey['activity_1']['refunded'] = 0;

$survey['activity_2']['total'] = 0;
$survey['activity_2']['paid'] = 0;
$survey['activity_2']['refunded'] = 0;

$survey['activity_3']['total'] = 0;
$survey['activity_3']['paid'] = 0;
$survey['activity_3']['refunded'] = 0;

$survey['tired_0']['total'] = 0;
$survey['tired_0']['paid'] = 0;
$survey['tired_0']['refunded'] = 0;

$survey['tired_1']['total'] = 0;
$survey['tired_1']['paid'] = 0;
$survey['tired_1']['refunded'] = 0;

$survey['tired_2']['total'] = 0;
$survey['tired_2']['paid'] = 0;
$survey['tired_2']['refunded'] = 0;

$survey['tired_3']['total'] = 0;
$survey['tired_3']['paid'] = 0;
$survey['tired_3']['refunded'] = 0;

$survey['recent_changes_0']['total'] = 0;
$survey['recent_changes_0']['paid'] = 0;
$survey['recent_changes_0']['refunded'] = 0;

$survey['recent_changes_1']['total'] = 0;
$survey['recent_changes_1']['paid'] = 0;
$survey['recent_changes_1']['refunded'] = 0;

$survey['recent_changes_2']['total'] = 0;
$survey['recent_changes_2']['paid'] = 0;
$survey['recent_changes_2']['refunded'] = 0;

$survey['recent_changes_3']['total'] = 0;
$survey['recent_changes_3']['paid'] = 0;
$survey['recent_changes_3']['refunded'] = 0;

$survey['goal_0']['total'] = 0;
$survey['goal_0']['paid'] = 0;
$survey['goal_0']['refunded'] = 0;

$survey['goal_1']['total'] = 0;
$survey['goal_1']['paid'] = 0;
$survey['goal_1']['refunded'] = 0;

$survey['goal_2']['total'] = 0;
$survey['goal_2']['paid'] = 0;
$survey['goal_2']['refunded'] = 0;

$survey['goal_3']['total'] = 0;
$survey['goal_3']['paid'] = 0;
$survey['goal_3']['refunded'] = 0;

$survey['goal_4']['total'] = 0;
$survey['goal_4']['paid'] = 0;
$survey['goal_4']['refunded'] = 0;

$survey['goal_5']['total'] = 0;
$survey['goal_5']['paid'] = 0;
$survey['goal_5']['refunded'] = 0;

$survey['goal_6']['total'] = 0;
$survey['goal_6']['paid'] = 0;
$survey['goal_6']['refunded'] = 0;

$survey['goal_7']['total'] = 0;
$survey['goal_7']['paid'] = 0;
$survey['goal_7']['refunded'] = 0;

$survey['goal_8']['total'] = 0;
$survey['goal_8']['paid'] = 0;
$survey['goal_8']['refunded'] = 0;


 $sql = "SELECT * FROM quiz WHERE email NOT LIKE '%test%' AND update_time between date_sub(now(),INTERVAL 1 WEEK) and now() ORDER BY id";
 $result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $strquiz = $row['quiz'];
        $quiz = array();
        $quiz = json_decode($row['quiz'], true);
        
        if($quiz['gender'] == 1) {
            $survey['male']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['male']['paid'] ++;
                //echo "mail_paid";
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['male']['refunded'] ++;
                //echo "mail_unpaid";
            }
            */
        } else if($quiz['gender'] == 0) {
            $survey['female']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['female']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['female']['refunded'] ++;
            }
            */
        }
        
        if($quiz['q_time'] == 0) {
            $survey['time_0']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['time_0']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['time_0']['refunded'] ++;
            }*/
        } else if($quiz['q_time'] == 1) {
            $survey['time_1']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['time_1']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['time_1']['refunded'] ++;
            }
            */
        } else if($quiz['q_time'] == 2) {
            $survey['time_2']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['time_2']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['time_2']['refunded'] ++;
            }
            */
        } else if($quiz['q_time'] == 3) {
            $survey['time_3']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['time_3']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['time_3']['refunded'] ++;
            }
            */
        }
        
        if($quiz['chicken'] == 1) {
            $survey['chicken']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['chicken']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['chicken']['refunded'] ++;
            }*/
        }
        if($quiz['pork'] == 1) {
            $survey['pork']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['pork']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['pork']['refunded'] ++;
            }*/
        }
        if($quiz['beef'] == 1) {
            $survey['beef']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['beef']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['beef']['refunded'] ++;
            }
            */
        }
        if($quiz['fish'] == 1) {
            $survey['fish']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['fish']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['fish']['refunded'] ++;
            }
            */
        }
        if($quiz['bacon'] == 1) {
            $survey['bacon']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['bacon']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['bacon']['refunded'] ++;
            }
            */
        }
        if($quiz['no_meat'] == 1) {
            $survey['no_meat']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['no_meat']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['no_meat']['refunded'] ++;
            }
            */
        }
        if($quiz['broccoli'] == 1) {
            $survey['broccoli']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['broccoli']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['broccoli']['refunded'] ++;
            }
            */
        }
        if($quiz['mushroom'] == 1) {
            $survey['mushroom']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['mushroom']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['mushroom']['refunded'] ++;
            }
            */
        }
        if($quiz['zuccini'] == 1) {
            $survey['zuccini']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['zuccini']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['zuccini']['refunded'] ++;
            }
            */
        }
        if($quiz['cauliflower'] == 1) {
            $survey['cauliflower']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['cauliflower']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['cauliflower']['refunded'] ++;
            }
            */
        }
        if($quiz['asparagus'] == 1) {
            $survey['asparagus']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['asparagus']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['asparagus']['refunded'] ++;
            }
            */
        }
        if($quiz['avocado'] == 1) {
            $survey['avocado']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['avocado']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['avocado']['refunded'] ++;
            }
            */
        }
        if($quiz['egg'] == 1) {
            $survey['egg']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['egg']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['egg']['refunded'] ++;
            }
            */
        }
        if($quiz['nut'] == 1) {
            $survey['nut']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['nut']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['nut']['refunded'] ++;
            }
            */
        }
        if($quiz['cheese'] == 1) {
            $survey['cheese']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['cheese']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['cheese']['refunded'] ++;
            }
            */
        }
        if($quiz['butter'] == 1) {
            $survey['butter']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['butter']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['butter']['refunded'] ++;
            }
            */
        }
        if($quiz['coconut'] == 1) {
            $survey['coconut']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['coconut']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['coconut']['refunded'] ++;
            }
            */
        }
        if($quiz['brussel_sprout'] == 1) {
            $survey['brussel_sprout']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['brussel_sprout']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['brussel_sprout']['refunded'] ++;
            }
            */
        }
        
        if($quiz['q_activity'] == 0) {
            $survey['activity_0']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['activity_0']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['activity_0']['refunded'] ++;
            }
            */
        } else if($quiz['q_activity'] == 1) {
            $survey['activity_1']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['activity_1']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['activity_1']['refunded'] ++;
            }
            */
        } else if($quiz['q_activity'] == 2) {
            $survey['activity_2']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['activity_2']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['activity_2']['refunded'] ++;
            }
            */
        } else if($quiz['q_activity'] == 3) {
            $survey['activity_3']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['activity_3']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['activity_3']['refunded'] ++;
            }
            */
        }
        
        if($quiz['q_tired'] == 0) {
            $survey['tired_0']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['tired_0']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['tired_0']['refunded'] ++;
            }
            */
        } else if($quiz['q_activity'] == 1) {
            $survey['tired_1']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['tired_1']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['tired_1']['refunded'] ++;
            }
            */
        } else if($quiz['q_activity'] == 2) {
            $survey['tired_2']['total'] ++;
            /*
            if(checkPaid($row['email'], $conn) == 1) {
                $survey['tired_2']['paid'] ++;
            } else if(checkPaid($row['email'], $conn) == -1) {
                $survey['tired_2']['refunded'] ++;
            }
            */
        } else if($quiz['q_activity'] == 3) {
            $survey['tired_3']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['tired_3']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['tired_3']['refunded'] ++;
            // }
        }
        
        if($quiz['q_recent_changes'] == 0) {
            $survey['recent_changes_0']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['recent_changes_0']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['recent_changes_0']['refunded'] ++;
            // }
        } else if($quiz['q_recent_changes'] == 1) {
            $survey['recent_changes_1']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['recent_changes_1']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['recent_changes_1']['refunded'] ++;
            // }
        } else if($quiz['q_recent_changes'] == 2) {
            $survey['recent_changes_2']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['recent_changes_2']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['recent_changes_2']['refunded'] ++;
            // }
        } else if($quiz['q_recent_changes'] == 3) {
            $survey['recent_changes_3']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['recent_changes_3']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['recent_changes_3']['refunded'] ++;
            // }
        }
        
        if($quiz['goal_0'] == 1) {
            $survey['goal_0']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_0']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_0']['refunded'] ++;
            // }
        }
        if($quiz['goal_1'] == 1) {
            $survey['goal_1']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_1']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_1']['refunded'] ++;
            // }
        }
        if($quiz['goal_2'] == 1) {
            $survey['goal_2']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_2']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_2']['refunded'] ++;
            // }
        }
        if($quiz['goal_3'] == 1) {
            $survey['goal_3']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_3']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_3']['refunded'] ++;
            // }
        }
        if($quiz['goal_4'] == 1) {
            $survey['goal_4']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_4']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_4']['refunded'] ++;
            // }
        }
        if($quiz['goal_5'] == 1) {
            $survey['goal_5']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_5']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_5']['refunded'] ++;
            // }
        }
        if($quiz['goal_6'] == 1) {
            $survey['goal_6']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_6']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_6']['refunded'] ++;
            // }
        }
        if($quiz['goal_7'] == 1) {
            $survey['goal_7']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_7']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_7']['refunded'] ++;
            // }
        }
        if($quiz['goal_8'] == 1) {
            $survey['goal_8']['total'] ++;
            // if(checkPaid($row['email'], $conn) == 1) {
            //     $survey['goal_8']['paid'] ++;
            // } else if(checkPaid($row['email'], $conn) == -1) {
            //     $survey['goal_8']['refunded'] ++;
            // }
        }
    }
}

//echo json_encode($survey);
/*
foreach($survey as $key => $value) {
  echo "-- $key <br />";
  echo json_encode($value);
  echo "<br />";
}
*/

$filename = $name='report_quiz_'.date('Y-m-d_hia').'.csv';
array_to_csv_download($survey, $filename);

return;

function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w'); 
    // loop over the input array
    
    fputcsv($f, array("name", "total", "paid", "refunded"), $delimiter);//first line
    
    foreach ($array as $key=>$line) { 
        // generate csv lines from the inner arrays
        array_unshift($line, $key);
        fputcsv($f, $line, $delimiter);
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
} 

function checkPaid($email, $conn) {
    $returnVal = 0; //unpaid: 0, paid: 1, refunded: -1
    $sql = "SELECT * FROM checkout WHERE email='" . $email . "' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row['refund'] == 1) {
                $returnVal = -1;
            } else {
                $returnVal = 1;
            }
        }
    } else {
        $returnVal = 0;
    }
    return $returnVal;
}


?>
