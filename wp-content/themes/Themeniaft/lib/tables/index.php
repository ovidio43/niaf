<?php
require_once '../ezSQL-master/shared/ez_sql_core.php';
require_once '../ezSQL-master/mysqli/ez_sql_mysqli.php';
$form = $_POST['form'];
$action = $_POST['action'];
$id = $_POST['id'];
$paginationFrom = $_POST['paginationFrom'];
$show = $_POST['show'];
$db = new ezSQL_mysqli();
if ($form == 'New York Gala Registration') {
    switch ($action) {
        case 'delete':
            if (deleteItemNewYorkGalaRegistration($db, $id)) {
                echo 'ok';
            } else {
                echo 'error';
            }
            break;
        case 'get_form':
            getFormNewYorkGalaRegistration($db, $paginationFrom, $show);
            break;
        case 'get_detail':
            getDetailNewYorkGalaRegistration($db, $id, $paginationFrom, $show);
            break;
    }
} elseif ($form == 'Golf Registration Form') {
    switch ($action) {
        case 'delete':
            if (deleteItemGolfRegistrationForm($db, $id)) {
                echo 'ok';
            } else {
                echo 'error';
            }
        case 'get_form':
            getGolfRegistrationForm($db, $paginationFrom, $show);
            break;
        case 'get_detail':
            getDetailGolfRegistrationForm($db, $id, $paginationFrom, $show);
            break;
    }
} elseif ($form == 3) {
    echo 'paso 3';
}

function paginationItems($db, $paginationFrom, $show, $cols) {
    $query = 'select count(*) as "num_items" from _new_york_gala_registration ';
    $row = $db->get_row($query);
    $next = ($paginationFrom + $show);
    $prev = ($paginationFrom - $show);
    if ($prev < 0) {
        $prev = 0;
    }
    ?>
    <tr>
        <td colspan="<?php echo $cols; ?>" align="center">
            <?php
            if ($paginationFrom > 0) {
                ?>
                <a href="#" class="link-prevNext" paginationFrom="<?php echo $prev; ?>" show="<?php echo $show; ?>"> &#8592; </a> 
                &nbsp;&nbsp;&nbsp;&nbsp;
                <?php
            }
            if ($next < $row->num_items) {
                ?>
                <a href="#" class="link-prevNext" paginationFrom="<?php echo $next; ?>" show="<?php echo $show; ?>"> &#8594; </a>
            <?php } ?>
        </td>
    </tr>
    <?php
}

/* * *******************New York Gala Registration Function******************************* */

function getFormNewYorkGalaRegistration($db, $paginationFrom, $show) {
    ?>
    <center><h1>Data : New York Gala Registration</h1></center>
    <table border="1" cellspacing="0" cellpadding="3" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Organization</th>
                <th>Address 1</th>            
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Home Phone</th>
                <th>Business Phone</th>
                <th>Emial</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'select * from _new_york_gala_registration ORDER BY date DESC LIMIT ' . $paginationFrom . ',' . $show;
            $results = $db->get_results($query);
            if ($results) {
                foreach ($results as $row) {
                    ?>
                    <tr> 
                        <td><?php echo $row->id_newYorkGalaRegistration; ?></td>                    
                        <td><?php echo $row->txtFirstName; ?></td>                    
                        <td><?php echo $row->txtLastName; ?></td>                                                                                    
                        <td><?php echo $row->txtOrganization; ?></td>                    
                        <td><?php echo $row->txtAddress1; ?></td>                                                            
                        <td><?php echo $row->txtCity; ?></td>                    
                        <td><?php echo $row->txtState; ?></td>                    
                        <td><?php echo $row->txtZip; ?></td>                    
                        <td><?php echo $row->txtHomePhone; ?></td>                    
                        <td><?php echo $row->txtBizPhone; ?></td>                    
                        <td><?php echo $row->txtEmail; ?></td>                                        
                        <td><?php echo $row->date; ?></td>                                        
                        <td>
                            <a href="<?php echo $row->id_newYorkGalaRegistration; ?>" class="view-detail" paginationFrom="<?php echo $paginationFrom; ?>" show="<?php echo $show; ?>" >View Detail</a>
                            <a  href="<?php echo $row->id_newYorkGalaRegistration; ?>" class="del-item">Delete</a>
                        </td>                                        
                    </tr>          
                    <?php
                }
                paginationItems($db, $paginationFrom, $show, 13);
            } else {
                ?>
                <tr>
                    <td colspan="13">No records found.</td>
                </tr>
                <?php
            }
            ?>       
        </tbody>
    </table>

    <?php
//    $query = 'describe `_new_york_gala_registration` ';
//    $db->debug($db->query($query));
}

function deleteItemNewYorkGalaRegistration($db, $id) {
    $query = 'DELETE FROM `_new_york_gala_registration` WHERE id_newYorkGalaRegistration=' . $id;
    if ($db->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getDetailNewYorkGalaRegistration($db, $id, $paginationFrom, $show) {
    ?>
    <h1>Detail</h1>
    <table cellpadding="3" align="center">        
        <tbody>
            <?php
            $query = 'SELECT * FROM `_new_york_gala_registration` WHERE id_newYorkGalaRegistration=' . $id;
            $row = $db->get_row($query);
            ?>
            <tr>
                <td><strong>ID</strong></td>
                <td><?php echo $id; ?></td>     
            </tr>            
            <tr>
                <td><strong>Package</strong></td>
                <td><?php echo $row->level; ?></td>     
            </tr>            
            <tr>
                <td><strong>NIAF Membership #</strong></td>
                <td><?php echo $row->guest1; ?></td> 
            </tr>            
            <tr>
                <td><strong>Salutation</strong></td>
                <td><?php echo $row->Salutation; ?></td>
            </tr>            
            <tr>
                <td><strong>First Name</strong></td>
                <td><?php echo $row->txtFirstName; ?></td>
            </tr>            
            <tr>
                <td><strong>Last Name</strong></td>
                <td><?php echo $row->txtLastName; ?></td>                    
            </tr>            
            <tr>
                <td><strong>Organization</strong></td>
                <td><?php echo $row->txtOrganization; ?></td>   
            </tr>            
            <tr>
                <td><strong>Address 1</strong></td>
                <td><?php echo $row->txtAddress1; ?></td>    
            </tr>            
            <tr>
                <td><strong>Address 2</strong></td>
                <td><?php echo $row->txtAddress2; ?></td>  
            </tr>            
            <tr>
                <td><strong>City</strong></td>
                <td><?php echo $row->txtCity; ?></td>  
            </tr>            
            <tr>
                <td><strong>State</strong></td>
                <td><?php echo $row->txtState; ?></td>  
            </tr>            
            <tr>
                <td><strong>Zip</strong></td>
                <td><?php echo $row->txtZip; ?></td>   
            </tr>            
            <tr>
                <td><strong>Home Phone</strong></td>
                <td><?php echo $row->txtHomePhone; ?></td>    
            </tr>            
            <tr>
                <td><strong>Business Phone</strong></td>
                <td><?php echo $row->txtBizPhone; ?></td>     
            </tr>            
            <tr>
                <td><strong>Emial</strong></td>
                <td><?php echo $row->txtEmail; ?></td>  
            </tr>            
            <tr>
                <td><strong>Date</strong></td>
                <td><?php echo $row->date; ?></td> 
            </tr>                       
        </tbody>
    </table>
    <p><a href="#" class="link-back" paginationFrom="<?php echo $paginationFrom; ?>" show="<?php echo $show; ?>">Back</a></p>
    <?php
}

/* * *******************Golf Registration Form Function******************************* */

function getGolfRegistrationForm($db, $paginationFrom, $show) {
    ?>
    <center><h1>Data : Golf Registration Form</h1></center>
    <table border="1" cellspacing="0" cellpadding="3" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Organization</th>
                <th>Address 1</th>            
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Home Phone</th>
                <th>Business Phone</th>
                <th>Emial</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'select * from  _golf_reg_form ORDER BY date DESC LIMIT ' . $paginationFrom . ',' . $show;
            $results = $db->get_results($query);
            if ($results) {
                foreach ($results as $row) {
                    ?>
                    <tr> 
                        <td><?php echo $row->id_golf_reg_form; ?></td>                    
                        <td><?php echo $row->x_first_name; ?></td>                    
                        <td><?php echo $row->x_last_name; ?></td>                                                                                    
                        <td><?php echo $row->txtOrganization; ?></td>                    
                        <td><?php echo $row->x_address; ?></td>                                                            
                        <td><?php echo $row->x_city; ?></td>                    
                        <td><?php echo $row->x_state; ?></td>                    
                        <td><?php echo $row->x_zip; ?></td>                    
                        <td><?php echo $row->txtHomePhone; ?></td>                    
                        <td><?php echo $row->txtBizPhone; ?></td>                    
                        <td><?php echo $row->txtEmail; ?></td>                                        
                        <td><?php echo $row->date; ?></td>                                        
                        <td>
                            <a href="<?php echo $row->id_golf_reg_form; ?>" class="view-detail" paginationFrom="<?php echo $paginationFrom; ?>" show="<?php echo $show; ?>" >View Detail</a>
                            <a  href="<?php echo $row->id_golf_reg_form; ?>" class="del-item">Delete</a>
                        </td>                                        
                    </tr>          
                    <?php
                }
                paginationItems($db, $paginationFrom, $show, 13);
            } else {
                ?>
                <tr>
                    <td colspan="13">No records found.</td>
                </tr>
                <?php
            }
            ?>       
        </tbody>
    </table>

    <?php
//    $query = 'describe `_new_york_gala_registration` ';
//    $db->debug($db->query($query));
}

function deleteItemGolfRegistrationForm($db, $id) {
    $query = 'DELETE FROM `_golf_reg_form` WHERE id_golf_reg_form=' . $id;
    if ($db->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getDetailGolfRegistrationForm($db, $id, $paginationFrom, $show) {
    ?>
    <h1>Detail</h1>
    <table cellpadding="3" align="center">        
        <tbody>
            <?php
            $query = 'SELECT * FROM `_golf_reg_form` WHERE id_golf_reg_form=' . $id;
            $row = $db->get_row($query);
            ?>            
            <tr>
                <td><strong>ID</strong></td>
                <td><?php echo $id; ?></td>     
            </tr>            
            <tr>
                <td><strong>First Name</strong></td>
                <td><?php echo $row->x_first_name; ?></td>                    
            </tr>            
            <tr>
                <td><strong>Last Name</strong></td>
                <td><?php echo $row->x_last_name; ?></td>  
            </tr>           

            <tr>
                <td><strong>Salutation</strong></td>
                <td><?php echo $row->Salutation; ?></td>
            </tr>            

            <tr>
                <td><strong>Organization</strong></td>
                <td><?php echo $row->txtOrganization; ?></td>   
            </tr>            
            <tr>
                <td><strong>Address 1</strong></td>
                <td><?php echo $row->x_address; ?></td>  
            </tr>            
            <tr>
                <td><strong>Address 2</strong></td>
                <td><?php echo $row->txtAddress2; ?></td>  
            </tr>            
            <tr>
                <td><strong>City</strong></td>
                <td><?php echo $row->x_city; ?></td> 
            </tr>            
            <tr>
                <td><strong>State</strong></td>
                <td><?php echo $row->x_state; ?></td> 
            </tr>            
            <tr>
                <td><strong>Zip</strong></td>
                <td><?php echo $row->x_zip; ?></td>     
            </tr>            
            <tr>
                <td><strong>Home Phone</strong></td>
                <td><?php echo $row->txtHomePhone; ?></td>    
            </tr>            
            <tr>
                <td><strong>Business Phone</strong></td>
                <td><?php echo $row->txtBizPhone; ?></td>     
            </tr>            
            <tr>
                <td><strong>Emial</strong></td>
                <td><?php echo $row->txtEmail; ?></td>  
            </tr>            
            <tr>
                <td><strong>Date</strong></td>
                <td><?php echo $row->date; ?></td> 
            </tr>                       
        </tbody>
    </table>
    <p><a href="#" class="link-back" paginationFrom="<?php echo $paginationFrom; ?>" show="<?php echo $show; ?>">Back</a></p>
    <?php
}
