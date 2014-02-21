<?php
require_once '../ezSQL-master/shared/ez_sql_core.php';
require_once '../ezSQL-master/mysqli/ez_sql_mysqli.php';
$form = $_POST['form'];
$action = $_POST['action'];
$dataMixed = Array('show' => $_POST['show'], 'paginationFrom' => $_POST['paginationFrom'], 'id' => $_POST['id']);
$db = new ezSQL_mysqli();
if ($form == 'New York Gala Registration') {
    $dataMixed['table_name'] = '_new_york_gala_registration';
    $dataMixed['colspan'] = '13';
    switch ($action) {
        case 'delete':
            if (deleteItemNewYorkGalaRegistration($db, $dataMixed)) {
                echo 'ok';
            } else {
                echo 'error';
            }
            break;
        case 'get_form':
            getFormNewYorkGalaRegistration($db, $dataMixed);
            break;
        case 'get_detail':
            getDetailNewYorkGalaRegistration($db, $dataMixed);
            break;
    }

} elseif ($form == 'Golf Registration Form') {
    $dataMixed['table_name'] = '_golf_reg_form';
    $dataMixed['colspan'] = '13';
    switch ($action) {
        case 'delete':
            if (deleteItemGolfRegistrationForm($db, $dataMixed)) {
                echo 'ok';
            } else {
                echo 'error';
            }
            break;
        case 'get_form':
            getGolfRegistrationForm($db, $dataMixed);
            break;
        case 'get_detail':
            getDetailGolfRegistrationForm($db, $dataMixed);
            break;
    }
//        $db->debug($db->query('select * from _golf_reg_form'));
} elseif ($form == 'Donate Info Form') {
    $dataMixed['table_name'] = '_donate_info_form';
    $dataMixed['colspan'] = '12';
    switch ($action) {
        case 'delete':
            if (deleteItemDonateInfoForm($db, $dataMixed)) {
                echo 'ok';
            } else {
                echo 'error';
            }
            break;
        case 'get_form':
            getDonateInfoForm($db, $dataMixed);
            break;
        case 'get_detail':
            getDetailDonateInfoForm($db, $dataMixed);
            break;
    }
} elseif ($form == 'Give the Gift of Heritage Form') {
    $dataMixed['table_name'] = '_give_the_gift_of_heritage_form';
    $dataMixed['colspan'] = '12';
    switch ($action) {
        case 'delete':
            if (deleteItemGivetheGiftofHeritageForm($db, $dataMixed)) {
                echo 'ok';
            } else {
                echo 'error';
            }
            break;
        case 'get_form':
            getGivetheGiftofHeritageForm($db, $dataMixed);
            break;
        case 'get_detail':
            getDetailGivetheGiftofHeritageForm($db, $dataMixed);
            break;
    }
}

function paginationItems($db, $dataMixed) {
    $query = 'select count(*) as "num_items" from ' . $dataMixed['table_name'];
    $row = $db->get_row($query);
    $next = ($dataMixed['paginationFrom'] + $dataMixed['show']);
    $prev = ($dataMixed['paginationFrom'] - $dataMixed['show']);
    if ($prev < 0) {
        $prev = 0;
    }
    ?>
    <tr>
        <td colspan="<?php echo $dataMixed['colspan']; ?>" align="center">
            <?php
            if ($dataMixed['paginationFrom'] > 0) {
                ?>
                <a href="#" class="link-prevNext" paginationFrom="<?php echo $prev; ?>" show="<?php echo $dataMixed['show']; ?>"> &#8592; </a> 
                &nbsp;&nbsp;&nbsp;&nbsp;
                <?php
            }
            if ($next < $row->num_items) {
                ?>
                <a href="#" class="link-prevNext" paginationFrom="<?php echo $next; ?>" show="<?php echo $dataMixed['show']; ?>"> &#8594; </a>
                <?php
            }
            ?>
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->num_items . ' Records'; ?></strong>
        </td>
    </tr>
    <?php
}

/* * *******************New York Gala Registration Function******************************* */

function getFormNewYorkGalaRegistration($db, $dataMixed) {
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
            $query = 'select * from _new_york_gala_registration ORDER BY date DESC LIMIT ' . $dataMixed['paginationFrom'] . ',' . $dataMixed['show'];
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
                            <a href="<?php echo $row->id_newYorkGalaRegistration; ?>" class="view-detail" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>" >View Detail</a>
                            <a  href="<?php echo $row->id_newYorkGalaRegistration; ?>" class="del-item">Delete</a>
                        </td>                                        
                    </tr>          
                    <?php
                }
                paginationItems($db, $dataMixed);
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

function deleteItemNewYorkGalaRegistration($db, $dataMixed) {
    $query = 'DELETE FROM `_new_york_gala_registration` WHERE id_newYorkGalaRegistration=' . $dataMixed['id'];
    if ($db->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getDetailNewYorkGalaRegistration($db, $dataMixed) {
    ?>
    <h1>Detail Item - New York Gala Registration</h1>
    <table cellpadding="3" align="center">        
        <tbody>
            <?php
            $query = 'SELECT * FROM `_new_york_gala_registration` WHERE id_newYorkGalaRegistration=' . $dataMixed['id'];
            $row = $db->get_row($query);
            ?>
            <tr>
                <td align="right"><strong>ID</strong></td>
                <td><?php echo $dataMixed['id']; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>Package</strong></td>
                <td><?php echo $row->level; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>NIAF Membership #</strong></td>
                <td><?php echo $row->guest1; ?></td> 
            </tr>            
            <tr>
                <td align="right"><strong>Salutation</strong></td>
                <td><?php echo $row->Salutation; ?></td>
            </tr>            
            <tr>
                <td align="right"><strong>First Name</strong></td>
                <td><?php echo $row->txtFirstName; ?></td>
            </tr>            
            <tr>
                <td align="right"><strong>Last Name</strong></td>
                <td><?php echo $row->txtLastName; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Organization</strong></td>
                <td><?php echo $row->txtOrganization; ?></td>   
            </tr>            
            <tr>
                <td align="right"><strong>Address 1</strong></td>
                <td><?php echo $row->txtAddress1; ?></td>    
            </tr>            
            <tr>
                <td align="right"><strong>Address 2</strong></td>
                <td><?php echo $row->txtAddress2; ?></td>  
            </tr>            
            <tr>
                <td align="right"><strong>City</strong></td>
                <td><?php echo $row->txtCity; ?></td>  
            </tr>            
            <tr>
                <td align="right"><strong>State</strong></td>
                <td><?php echo $row->txtState; ?></td>  
            </tr>            
            <tr>
                <td align="right"><strong>Zip</strong></td>
                <td><?php echo $row->txtZip; ?></td>   
            </tr>            
            <tr>
                <td align="right"><strong>Home Phone</strong></td>
                <td><?php echo $row->txtHomePhone; ?></td>    
            </tr>            
            <tr>
                <td align="right"><strong>Business Phone</strong></td>
                <td><?php echo $row->txtBizPhone; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>Emial</strong></td>
                <td><?php echo $row->txtEmail; ?></td>  
            </tr>            
            <tr>
                <td align="right"><strong>Date</strong></td>
                <td><?php echo $row->date; ?></td> 
            </tr>                       
        </tbody>
    </table>
    <p><a href="#" class="link-back" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>">Back</a></p>
    <?php
}

/* * *******************Golf Registration Form Function******************************* */

function getGolfRegistrationForm($db, $dataMixed) {
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
            $query = 'select * from  _golf_reg_form ORDER BY date DESC LIMIT ' . $dataMixed['paginationFrom'] . ',' . $dataMixed['show'];
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
                            <a href="<?php echo $row->id_golf_reg_form; ?>" class="view-detail" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>" >View Detail</a>
                            <a  href="<?php echo $row->id_golf_reg_form; ?>" class="del-item">Delete</a>
                        </td>                                        
                    </tr>          
                    <?php
                }
                paginationItems($db, $dataMixed);
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

function deleteItemGolfRegistrationForm($db, $dataMixed) {
    $query = 'DELETE FROM `_golf_reg_form` WHERE id_golf_reg_form=' . $dataMixed['id'];
    if ($db->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getDetailGolfRegistrationForm($db, $dataMixed) {
    ?>
    <h1>Detail Item - Golf Registration Form</h1>
    <table cellpadding="3" align="center">        
        <tbody>
            <?php
            $query = 'SELECT * FROM `_golf_reg_form` WHERE id_golf_reg_form=' . $dataMixed['id'];
            $row = $db->get_row($query);
            ?>            
            <tr>
                <td align="right"><strong>ID</strong></td>
                <td><?php echo $dataMixed['id']; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>First Name</strong></td>
                <td><?php echo $row->x_first_name; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Last Name</strong></td>
                <td><?php echo $row->x_last_name; ?></td>  
            </tr>           

            <tr>
                <td align="right"><strong>Salutation</strong></td>
                <td><?php echo $row->Salutation; ?></td>
            </tr>            

            <tr>
                <td align="right"><strong>Organization</strong></td>
                <td><?php echo $row->txtOrganization; ?></td>   
            </tr>            
            <tr>
                <td align="right"><strong>Address 1</strong></td>
                <td><?php echo $row->x_address; ?></td>  
            </tr>            
            <tr>
                <td align="right"><strong>Address 2</strong></td>
                <td><?php echo $row->txtAddress2; ?></td>  
            </tr>            
            <tr>
                <td align="right"><strong>City</strong></td>
                <td><?php echo $row->x_city; ?></td> 
            </tr>            
            <tr>
                <td align="right"><strong>State</strong></td>
                <td><?php echo $row->x_state; ?></td> 
            </tr>            
            <tr>
                <td align="right"><strong>Zip</strong></td>
                <td><?php echo $row->x_zip; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>Home Phone</strong></td>
                <td><?php echo $row->txtHomePhone; ?></td>    
            </tr>            
            <tr>
                <td align="right"><strong>Business Phone</strong></td>
                <td><?php echo $row->txtBizPhone; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>Emial</strong></td>
                <td><?php echo $row->txtEmail; ?></td>  
            </tr>            
            <tr>
                <td align="right"><strong>Date</strong></td>
                <td><?php echo $row->date; ?></td> 
            </tr>                       
        </tbody>
    </table>
    <p><a href="#" class="link-back" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>">Back</a></p>
    <?php
}

/* * *******************Donate Info Form******************************* */

function getDonateInfoForm($db, $dataMixed) {
    ?>
    <center><h1>Data : Donate Info Form</h1></center>
    <table border="1" cellspacing="0" cellpadding="3" align="center">
        <thead>
            <tr>                
                <th>First Name</th>
                <th>Last Name</th>                                
                <th>Organization</th>
                <th>Address 1</th>            
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Home Telephone</th>
                <th>Work Telephone</th>
                <th>Emial</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'select * from  _donate_info_form ORDER BY date DESC LIMIT ' . $dataMixed['paginationFrom'] . ',' . $dataMixed['show'];
            $results = $db->get_results($query);
            if ($results) {
                foreach ($results as $row) {
                    ?>
                    <tr>                         
                        <td><?php echo $row->txtFirstName; ?></td>                    
                        <td><?php echo $row->txtLastName; ?></td>                                                                                    
                        <td><?php echo $row->txtOrganization; ?></td>                    
                        <td><?php echo $row->txtAddress1; ?></td>                                                            
                        <td><?php echo $row->txtCity; ?></td>                    
                        <td><?php echo $row->txtState; ?></td>                    
                        <td><?php echo $row->txtZip; ?></td>                    
                        <td><?php echo $row->txtHomePhone; ?></td>                    
                        <td><?php echo $row->txtWorkPhone; ?></td>                    
                        <td><?php echo $row->txtEmail; ?></td>                                        
                        <td><?php echo $row->date; ?></td>                                        
                        <td>
                            <a href="<?php echo $row->id_donate_info_form; ?>" class="view-detail" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>" >View Detail</a>
                            <a  href="<?php echo $row->id_donate_info_form; ?>" class="del-item">Delete</a>
                        </td>                                        
                    </tr>          
                    <?php
                }
                paginationItems($db, $dataMixed);
            } else {
                ?>
                <tr>
                    <td colspan="12">No records found.</td>
                </tr>
                <?php
            }
            ?>       
        </tbody>
    </table>
    <?php
}

function deleteItemDonateInfoForm($db, $dataMixed) {//ojo tiene tablas relaciondas (recipietns)
    $query = 'DELETE FROM `_donate_info_form` WHERE id_donate_info_form=' . $dataMixed['id'];
    if ($db->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getDetailDonateInfoForm($db, $dataMixed) {
    ?>
    <h1>Detail Item - Donate Info Form</h1>
    <table cellpadding="3" align="center">        
        <tbody>
            <?php
            $query = 'SELECT * FROM `_donate_info_form` WHERE id_donate_info_form=' . $dataMixed['id'];
            $row = $db->get_row($query);
            ?>            
            <tr>
                <td align="right"><strong>ID</strong></td>
                <td><?php echo $dataMixed['id']; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>First Name</strong></td>
                <td><?php echo $row->txtFirstName; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Last Name</strong></td>
                <td><?php echo $row->txtLastName; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Spouse Name - if applicable</strong></td>
                <td><?php echo $row->txtSpouse; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Organization</strong></td>
                <td><?php echo $row->txtOrganization; ?></td>                    
            </tr>                               
            <tr>
                <td align="right"><strong>Title</strong></td>
                <td><?php echo $row->txtTitle; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Check if this is a work address</strong></td>
                <td><?php echo $row->strWorkAddr; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Street</strong></td>
                <td><?php echo $row->txtAddress1; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Street 2</strong></td>
                <td><?php echo $row->txtAddress2; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>City</strong></td>
                <td><?php echo $row->txtCity; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>State</strong></td>
                <td><?php echo $row->txtState; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Zip</strong></td>
                <td><?php echo $row->txtZip; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Home Phone</strong></td>
                <td><?php echo $row->txtHomePhone; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Work Phone</strong></td>
                <td><?php echo $row->txtWorkPhone; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Email</strong></td>
                <td><?php echo $row->txtEmail; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Fax Phone</strong></td>
                <td><?php echo $row->txtFaxPhone; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Category of Donation</strong></td>
                <td><?php echo $row->categoryDonation; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Recipient(s)</strong></td>
                <td><?php echo $row->numgifts; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Donation Amount </strong></td>
                <td><?php echo $row->DonateAmt; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Donation Amount </strong></td>
                <td><?php echo $row->x_amount; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Card Type</strong></td>
                <td><?php echo $row->x_card_type; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Card Number </strong></td>
                <td><?php echo $row->x_card_num; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Expiration Month</strong></td>
                <td><?php echo $row->x_expiration_month; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Expiration Year</strong></td>
                <td><?php echo $row->x_expiration_year; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right" width="40%" ><strong>Step 3 : Check this box if the credit card billing address is the same as previously entered. If not, please complete the below</strong></td>
                <td><?php echo $row->checkAddressSame; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : First Name</strong></td>
                <td><?php echo $row->x_first_name; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Last Name</strong></td>
                <td><?php echo $row->x_last_name; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Street </strong></td>
                <td><?php echo $row->x_address; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : City  </strong></td>
                <td><?php echo $row->x_city; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : State   </strong></td>
                <td><?php echo $row->x_state; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Zip </strong></td>
                <td><?php echo $row->x_zip; ?></td>                    
            </tr>                                        
        </tbody>
    </table>
    <p><a href="#" class="link-back" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>">Back</a></p>
    <?php
}

/* * ************Give the Gift of Heritage Form**************************** */

function getGivetheGiftofHeritageForm($db, $dataMixed) {
    ?>
    <center><h1>Data : Give the Gift of Heritage Form</h1></center>
    <table border="1" cellspacing="0" cellpadding="3" align="center">
        <thead>
            <tr>                
                <th>First Name</th>
                <th>Last Name</th>                                
                <th>Organization</th>
                <th>Address 1</th>            
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Home Telephone</th>
                <th>Work Telephone</th>
                <th>Emial</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'select * from  _give_the_gift_of_heritage_form ORDER BY date DESC LIMIT ' . $dataMixed['paginationFrom'] . ',' . $dataMixed['show'];
            $results = $db->get_results($query);
            if ($results) {
                foreach ($results as $row) {
                    ?>
                    <tr>                         
                        <td><?php echo $row->txtFirstName; ?></td>                    
                        <td><?php echo $row->txtLastName; ?></td>                                                                                    
                        <td><?php echo $row->txtOrganization; ?></td>                    
                        <td><?php echo $row->txtAddress1; ?></td>                                                            
                        <td><?php echo $row->txtCity; ?></td>                    
                        <td><?php echo $row->txtState; ?></td>                    
                        <td><?php echo $row->txtZip; ?></td>                    
                        <td><?php echo $row->txtHomePhone; ?></td>                    
                        <td><?php echo $row->txtWorkPhone; ?></td>                    
                        <td><?php echo $row->txtEmail; ?></td>                                        
                        <td><?php echo $row->date; ?></td>                                        
                        <td>
                            <a href="<?php echo $row->id_give_the_gift_of_heritage_form; ?>" class="view-detail" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>" >View Detail</a>
                            <a  href="<?php echo $row->id_give_the_gift_of_heritage_form; ?>" class="del-item">Delete</a>
                        </td>                                        
                    </tr>          
                    <?php
                }
                paginationItems($db, $dataMixed);
            } else {
                ?>
                <tr>
                    <td colspan="12">No records found.</td>
                </tr>
                <?php
            }
            ?>       
        </tbody>
    </table>
    <?php
}

function deleteItemGivetheGiftofHeritageForm($db, $dataMixed) {//ojo tiene tablas relaciondas (recipietns)
    $query = 'DELETE FROM `_give_the_gift_of_heritage_form` WHERE id_give_the_gift_of_heritage_form=' . $dataMixed['id'];
    if ($db->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getDetailGivetheGiftofHeritageForm($db, $dataMixed) {
    ?>
    <h1>Detail Item - Donate Info Form</h1>
    <table cellpadding="3" align="center">        
        <tbody>
            <?php
            $query = 'SELECT * FROM `_give_the_gift_of_heritage_form` WHERE id_give_the_gift_of_heritage_form=' . $dataMixed['id'];
            $row = $db->get_row($query);
            ?>            
            <tr>
                <td align="right"><strong>ID</strong></td>
                <td><?php echo $dataMixed['id']; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>First Name</strong></td>
                <td><?php echo $row->txtFirstName; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Last Name</strong></td>
                <td><?php echo $row->txtLastName; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Spouse Name - if applicable</strong></td>
                <td><?php echo $row->txtSpouse; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Organization</strong></td>
                <td><?php echo $row->txtOrganization; ?></td>                    
            </tr>                               
            <tr>
                <td align="right"><strong>Title</strong></td>
                <td><?php echo $row->txtTitle; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Check if this is a work address</strong></td>
                <td><?php echo $row->strWorkAddr; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Street</strong></td>
                <td><?php echo $row->txtAddress1; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Street 2</strong></td>
                <td><?php echo $row->txtAddress2; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>City</strong></td>
                <td><?php echo $row->txtCity; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>State</strong></td>
                <td><?php echo $row->txtState; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Zip</strong></td>
                <td><?php echo $row->txtZip; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Home Phone</strong></td>
                <td><?php echo $row->txtHomePhone; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Work Phone</strong></td>
                <td><?php echo $row->txtWorkPhone; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Email</strong></td>
                <td><?php echo $row->txtEmail; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Fax Phone</strong></td>
                <td><?php echo $row->txtFaxPhone; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Gift Memberships - Recipient(s)</strong></td>
                <td><?php echo $row->nummemberships; ?></td>                    
            </tr>                                                                                      
            <tr>
                <td align="right"><strong>Step 3 : Donation Amount </strong></td>
                <td><?php echo $row->x_amount; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Card Type</strong></td>
                <td><?php echo $row->x_card_type; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Card Number </strong></td>
                <td><?php echo $row->x_card_num; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Expiration Month</strong></td>
                <td><?php echo $row->x_expiration_month; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Expiration Year</strong></td>
                <td><?php echo $row->x_expiration_year; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right" width="40%" ><strong>Step 3 : Check this box if the credit card billing address is the same as previously entered. If not, please complete the below</strong></td>
                <td><?php echo $row->checkAddressSame; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : First Name</strong></td>
                <td><?php echo $row->x_first_name; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Last Name</strong></td>
                <td><?php echo $row->x_last_name; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Street </strong></td>
                <td><?php echo $row->x_address; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : City  </strong></td>
                <td><?php echo $row->x_city; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : State   </strong></td>
                <td><?php echo $row->x_state; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Step 3 : Zip </strong></td>
                <td><?php echo $row->x_zip; ?></td>                    
            </tr>                                        
        </tbody>
    </table>
    <p><a href="#" class="link-back" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>">Back</a></p>
    <?php
}
