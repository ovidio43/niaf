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
} elseif ($form == 'Bracco Scholarship Application Form') {
    $dataMixed['table_name'] = 'bracco_scholarship_application_form';
    $dataMixed['colspan'] = '12';
    switch ($action) {
        case 'delete':
            if (deleteBraccoScholarshipApplicationForm($db, $dataMixed)) {
                echo 'ok';
            } else {
                echo 'error';
            }
            break;
        case 'get_form':
            getBraccoScholarshipApplicationForm($db, $dataMixed);
            break;
        case 'get_detail':
            getDetailBraccoScholarshipApplicationForm($db, $dataMixed);
            break;
    }
} elseif ($form == 'Anniversary Gala Registration') {
    $dataMixed['table_name'] = 'anniversary_gala_registration_form';
    $dataMixed['colspan'] = '11';
    switch ($action) {
        case 'delete':
            if (deleteAnniversaryGalaRegistrationForm($db, $dataMixed)) {
                echo 'ok';
            } else {
                echo 'error';
            }
            break;
        case 'get_form':
            getAnniversaryGalaRegistrationForm($db, $dataMixed);
            break;
        case 'get_detail':
            getDetailAnniversaryGalaRegistrationForm($db, $dataMixed);
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

/* * ************Bracco Scholarship Application Form**************************** */

function getBraccoScholarshipApplicationForm($db, $dataMixed) {
    ?>
    <center><h1>Data : Bracco Scholarship Application Form</h1></center>
    <table border="1" cellspacing="0" cellpadding="3" align="center">
        <thead>
            <tr>                
                <th>First Name</th>
                <th>Middle Name</th>                                
                <th>Last Name</th>                                                
                <th>Gender</th>                                                
                <th>Address 1</th>            
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone Number</th>
                <th>Email</th>                
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'select * from  ' . $dataMixed['table_name'] . ' ORDER BY date DESC LIMIT ' . $dataMixed['paginationFrom'] . ',' . $dataMixed['show'];
            $results = $db->get_results($query);
            if ($results) {
                foreach ($results as $row) {
                    ?>
                    <tr>                         
                        <td><?php echo $row->firstName; ?></td>                                                                                   
                        <td><?php echo $row->middleName; ?></td>                                                                                   
                        <td><?php echo $row->lastName; ?></td>                                                                                   
                        <td><?php echo $row->gender; ?></td>                                                                                   
                        <td><?php echo $row->address; ?></td>                                                                                   
                        <td><?php echo $row->city; ?></td>                                                                                   
                        <td><?php echo $row->state; ?></td>                                                                                   
                        <td><?php echo $row->zipCode; ?></td>                                                                                   
                        <td><?php echo $row->phoneNumber; ?></td>                                                                                   
                        <td><?php echo $row->email; ?></td>                                                                                   
                        <td><?php echo $row->date; ?></td>                                                                                   
                        <td>
                            <a href="<?php echo $row->id; ?>" class="view-detail" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>" >View Detail</a>
                            <a  href="<?php echo $row->id; ?>" class="del-item">Delete</a>
                        </td>                                        
                    </tr>          
                    <?php
                }

//                $db->debug($db->query('select *  from ' . $dataMixed['table_name']));
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

function deleteBraccoScholarshipApplicationForm($db, $dataMixed) {
    $query = 'DELETE FROM `' . $dataMixed['table_name'] . '` WHERE id=' . $dataMixed['id'];
    if ($db->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getDetailBraccoScholarshipApplicationForm($db, $dataMixed) {
    ?>
    <h1>Detail Item - Bracco Scholarship Application Form</h1>
    <table cellpadding="3" align="center">        
        <tbody>
            <?php
            $query = 'SELECT * FROM `' . $dataMixed['table_name'] . '` WHERE id=' . $dataMixed['id'];
            $row = $db->get_row($query);
            ?>            
            <tr>
                <td align="right"><strong>ID</strong></td>
                <td><?php echo $dataMixed['id']; ?></td>     
            </tr>            
            <tr>
                <td align="right"><strong>How did you hear about the NIAF/Bracco Foundation Scholarship? </strong></td>
                <td><?php echo $row->question1; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>First Name</strong></td>
                <td><?php echo $row->firstName; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Middle Name</strong></td>
                <td><?php echo $row->middleName; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Last Name</strong></td>
                <td><?php echo $row->lastName; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Gender</strong></td>
                <td><?php echo $row->gender; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Address</strong></td>
                <td><?php echo $row->address; ?></td>                    
            </tr>                               
            <tr>
                <td align="right"><strong>Address 2</strong></td>
                <td><?php echo $row->address1; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>City</strong></td>
                <td><?php echo $row->city; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>State</strong></td>
                <td><?php echo $row->state; ?></td>                    
            </tr>            
            <tr>
                <td align="right"><strong>Zip Code</strong></td>
                <td><?php echo $row->zipCode; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Phone Number</strong></td>
                <td><?php echo $row->phoneNumber; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Email</strong></td>
                <td><?php echo $row->email; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Confirm Email</strong></td>
                <td><?php echo $row->confirmEmail; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Month</strong></td>
                <td><?php echo $row->month; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Day</strong></td>
                <td><?php echo $row->day; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Year</strong></td>
                <td><?php echo $row->year; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Place of Birth</strong></td>
                <td><?php echo $row->placeBirth; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Parent/Guardian Name</strong></td>
                <td><?php echo $row->parentGuardanName; ?></td>                    
            </tr>                                                                                      
            <tr>
                <td align="right"><strong>Parent: Address</strong></td>
                <td><?php echo $row->parentAddress; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Parent: Address 2</strong></td>
                <td><?php echo $row->parentAddress1; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Parent : City</strong></td>
                <td><?php echo $row->parentCity; ?></td>                    
            </tr>                                                                                          
            <tr>
                <td align="right"><strong>Parent : State</strong></td>
                <td><?php echo $row->parentState; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Parent :  Zip Code</strong></td>
                <td><?php echo $row->parentZipCode; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Parent : Phone</strong></td>
                <td><?php echo $row->parentPhone; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Father of Italian Descent?</strong></td>
                <td><?php echo $row->fatherItalian; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Mother of Italian Descent?</strong></td>
                <td><?php echo $row->motherItalian; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right" width="40%"><strong>Select the region(s) where your ancestors are from. (To select multiple regions, press the Cntrl key as you click the regions)</strong></td>
                <td><?php echo $row->regions; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>(Optional) Enter more specific information (cities, etc...)</strong></td>
                <td><?php echo $row->specificInformation; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>Name of school</strong></td>
                <td><?php echo $row->academicNameSchool; ?></td>                    
            </tr>                                        
            <tr>
                <td align="right"><strong>State abbreviation of school</strong></td>
                <td><?php echo $row->academicState; ?></td>                    
            </tr> 
            <tr>
                <td align="right"><strong>Major</strong></td>
                <td><?php echo $row->major; ?></td>                    
            </tr> 
            <tr>
                <td align="right"><strong>Degree/Qualifications (PhD/MD/MSc)</strong></td>
                <td><?php echo $row->degreeQualifications; ?></td>                    
            </tr> 
            <tr>
                <td align="right"><strong>Year of Graduation</strong></td>
                <td><?php echo $row->yearGraduation; ?></td>                    
            </tr> 
            <tr>
                <td align="right"><strong>Overall GPA</strong></td>
                <td><?php echo $row->overall; ?></td>                    
            </tr> 
            <tr>
                <td align="right"><strong>Have you participated in any NIAF programs or activities in the past, including winning a NIAF scholarship?</strong></td>
                <td><?php echo $row->participateNiafPrograms; ?></td>                    
            </tr> 
            <tr>
                <td align="right"><strong>If yes, list the program(s) and year(s)</strong></td>
                <td><?php echo $row->participateNiafProgramsWhen; ?></td>                    
            </tr> 
            <tr>
                <td align="right"><strong>Describe key aspects of your original scientific research. (No less than 650 words) </strong></td>
                <td><?php echo $row->describeKeyAspects; ?></td>                    
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

/* * ************Anniversary Gala Registration Form**************************** */

function deleteAnniversaryGalaRegistrationForm($db, $dataMixed) {
    $query = 'DELETE FROM `' . $dataMixed['table_name'] . '` WHERE id=' . $dataMixed['id'];
    if ($db->query($query)) {
        return true;
    } else {
        return false;
    }
}

function getAnniversaryGalaRegistrationForm($db, $dataMixed) {
    ?>
    <center><h1>Data : Anniversary Gala Registration Form</h1></center>
    <table border="1" cellspacing="0" cellpadding="3" align="center">
        <thead>
            <tr>                  
                <th>Salutation</th>
                <th>First Name</th>                                              
                <th>Last Name</th>                                                                                                               
                <th>Address 1</th>            
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone Number</th>
                <th>Email</th>                
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'select * from  ' . $dataMixed['table_name'] . ' ORDER BY date DESC LIMIT ' . $dataMixed['paginationFrom'] . ',' . $dataMixed['show'];
            $results = $db->get_results($query);
            if ($results) {
                foreach ($results as $row) {
                    ?>
                    <tr>                         
                        <td><?php echo $row->Salutation; ?></td>                                                                                   
                        <td><?php echo $row->txtFirstName; ?></td>                                                                                                                                                                                            
                        <td><?php echo $row->txtLastName; ?></td>                                                                                                                                                                                             
                        <td><?php echo $row->txtAddress1; ?></td>                                                                                   
                        <td><?php echo $row->txtCity; ?></td>                                                                                   
                        <td><?php echo $row->txtState; ?></td>                                                                                   
                        <td><?php echo $row->txtZip; ?></td>                                                                                   
                        <td><?php echo $row->txtHomePhone; ?></td>                                                                                   
                        <td><?php echo $row->txtEmail; ?></td>                                                                                   
                        <td><?php echo $row->date; ?></td>                                                                                   
                        <td>
                            <a href="<?php echo $row->id; ?>" class="view-detail" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>" >View Detail</a>
                            <a  href="<?php echo $row->id; ?>" class="del-item">Delete</a>
                        </td>                                        
                    </tr>          
                    <?php
                }

//                $db->debug($db->query('select *  from ' . $dataMixed['table_name']));
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

function getDetailAnniversaryGalaRegistrationForm($db, $dataMixed) {
    ?>
    <h1>Detail Item - Anniversary Gala Registration Form</h1>
    <?php
    $query = 'SELECT * FROM `' . $dataMixed['table_name'] . '` WHERE id=' . $dataMixed['id'];
    $row = $db->get_row($query);
    ?> 
    <table width="100%">
        <tbody>
            <tr>
                <td colspan="2"><br><center><b><u>Please complete below</u></b></center><br></td>
        </tr>
        <tr>
            <td width="39%"><font color="red">*&nbsp;</font> Salutation:</td>
            <td>
                <?php echo $row->Salutation; ?>
            </td>
        </tr>
        <tr>
            <td><font color="red">*&nbsp;</font> First Name:</td>            
            <td><?php echo $row->txtFirstName; ?></td>
        </tr>
        <tr>
            <td><font color="red">*&nbsp;</font> Last Name:</td>  
            <td><?php echo $row->txtLastName; ?></td>            
        </tr>
        <tr>
            <td>&nbsp;&nbsp;Firm/Organization:</td>            
            <td><?php echo $row->txtOrganization; ?></td>            
        </tr>
        <tr>
            <td><font color="red">*&nbsp;</font>Address:</td>            
            <td><?php echo $row->txtAddress1; ?></td>            
        </tr>
        <tr>
            <td></td>
            <td><?php echo $row->txtAddress2; ?></td>            
        </tr>
        <tr>
            <td><font color="red">*&nbsp;</font>City:</td>            
            <td><?php echo $row->txtCity; ?></td>                        
        </tr>
        <tr>
            <td><font color="red">*&nbsp;</font>State Abbreviation:</td>            
            <td><?php echo $row->txtState; ?></td>                        
        </tr>
        <tr>
            <td><font color="red">*&nbsp;</font>Zip Code:</td>            
            <td><?php echo $row->txtZip; ?></td>                        
        </tr>
        <tr>
            <td>Home Phone:</td>            
            <td><?php echo $row->txtHomePhone; ?></td>              
        </tr>
        <tr>
            <td>Business Phone:</td>            
            <td><?php echo $row->txtBizPhone; ?></td>              
        </tr>
        <tr>
            <td><font color="red">*&nbsp;</font>E-mail Address:</td>            
            <td><?php echo $row->txtEmail; ?></td>              
        </tr>
        <tr>
            <td>NIAF Member ID:</td>            
            <td><?php echo $row->txtMemberID; ?></td> 
        </tr>    
    </tbody>
    </table>
<hr>
    <table cellpadding="3" align="center" width="100%" >        
        <tbody>                 
            <tr>
                <td colspan="3">Option A: Package Deals</td>
            </tr>
            <tr>
                <td width="8%">
                    <b><?php echo $row->select_dollargalapackage; ?></b>							
                </td>
                <td width="76%">
                    <b>Reserve Package / Best Weekend Package Deal</b> 
                    <br>
                    <font color="blue"><b>($200 per person for NIAF Members)</b></font>
                    <br>
                    <i>(Includes all weekend activities; DOES NOT INCLUDE NIAF GALA)</i>                										
                </td>
                <td><b>$ <?php echo $row->dollargalapackage; ?></b></td>            
            </tr>			
            <tr>
                <td>
                    <b><?php echo $row->select_dollarnongalapackage; ?></b>
                </td>
                <td>
                    <b>Reserve Package / Best Weekend Package Deal</b>
                    <br>
                    <font color="blue"><b>($250 per person for Non-NIAF Members)</b></font>
                    <br>
                    <i>(Includes all weekend activities; DOES NOT INCLUDE NIAF GALA)</i>                									
                </td>
                <td><b>$ <?php echo $row->dollarnongalapackage; ?></b></td>
            </tr>			
            <tr>
                <td colspan="3"><br><hr></td>
            </tr>
            <tr>
                <td colspan="3">Option B: Reserve Individually<br></td>
            </tr>
            <tr>
                <td colspan="3"><br>Friday, October 25</td>								  
                <td>&nbsp; </td>
            </tr>        
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <b><i>NIAF Casino Night with Live and Silent Auction <font color="red">(Buy 1, Get 1 Free)</font></i></b>
                </td>
            </tr>
            <tr>
                <td>
                    <b><?php echo $row->select_dollarmemcasino; ?></b>
                </td>
                <td><b>Member Ticket(s)</b> @ $175 <strike>per person</strike> <font color="red">for 2 tickets </font></td>
    <td><b>$ <?php echo $row->dollarmemcasino; ?></b></td>
    </tr>
    <tr>
        <td>
            <b><?php echo $row->select_dollarnonmemcasino; ?></b>            						
        </td>
        <td>
            <b>Non-Member Ticket(s)</b> @ $200 <strike>per person</strike> <font color="red">for 2 tickets!</font>         			
    </td>
    <td><b>$ <?php echo $row->dollarnonmemcasino; ?></b></td>
    </tr>
    <tr>
        <td>
            <b><?php echo $row->select_dollarvipcasino; ?></b>             						
        </td>
        <td>
            <b>VIP Ticket(s)</b> @ $250 <strike>per person</strike> <font color="red">for 2 tickets!</font> - VIP Ticket includes an increased amount of "funny money" for the casino games and access to the <i>High Rollers</i> area        
    </td>
    <td><b>$ <?php echo $row->dollarvipcasino; ?></b></td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3">Saturday, October 26</td>								  
        <td>&nbsp; </td>
    </tr>
    <tr>
        <td>
            <b><?php echo $row->select_dollarnaifnetworking; ?></b>              						
        </td>
        <td>
            <b>NIAF Networking Event</b>(Open to all convention participants) (No Fee)
        </td>
        <td><b>$ <?php echo $row->dollarnaifnetworking; ?></b></td>
    </tr>

    <tr>
        <td>
            <b><?php echo $row->select_dollarwinetasting; ?></b>								
        </td>
        <td>
            <b>Wine Tasting and Luncheon</b> @ $75 per person (<font color="red"><b><u>SOLD OUT</u></b></font>)                		
        </td>
        <td><b>$ <?php echo $row->dollarwinetasting; ?></b></td>
    </tr>
    <tr>
        <td colspan="3"><br><hr></td>
    </tr>
    <tr>
        <td colspan="3">NIAF Gala</td>								
        <td>&nbsp; </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">
            <b>Premier Seating</b>
        </td>
    </tr>
    <tr>
        <td>
            <b><?php echo $row->select_dollarmempremier; ?></b>            								
        </td>
        <td>
            Member Gala Ticket(s) @ $850 each                 
        </td>
        <td><b>$ <?php echo $row->dollarmempremier; ?></b></td>
    </tr>
    <tr>
        <td>
            <b><?php echo $row->select_dollarpremier; ?></b>             							
        </td>
        <td>
            Non-Member Gala Ticket(s) @ $1,000 each 
        </td>
        <td><b>$ <?php echo $row->select_dollarpremier; ?></b></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">
            <b>Preferred Seating</b>
        </td>
    </tr>
    <tr>
        <td>
            <b><?php echo $row->select_dollarmemprefer; ?></b>             					
        </td>
        <td>
            Member Gala Ticket(s) @ $500 each                 
        </td>
        <td><b>$ <?php echo $row->select_dollarmemprefer; ?></b></td>
    </tr>				
    <tr>
        <td>
            <b><?php echo $row->select_dollarprefer; ?></b>            					
        </td>
        <td>
            Non-Member Gala Ticket(s) @ $600 each                 
        </td>
        <td><b>$ <?php echo $row->select_dollarprefer; ?></b></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">
            <b>Standard Seating</b>
        </td>
    </tr>
    <tr>
        <td>
            <b><?php echo $row->select_dollarmemstandard; ?></b>  

        </td>
        <td>
            Member Gala Ticket(s) @ $350 each                 
        </td>
        <td><b>$ <?php echo $row->select_dollarmemstandard; ?></b></td>
    </tr>

    <tr>
        <td>
            <b><?php echo $row->select_dollarstandard; ?></b>             				
        </td>
        <td>
            Non-Member Gala Ticket(s) @ $400 each                 					
        </td>
        <td><b>$ <?php echo $row->select_dollarstandard; ?></b></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">
            <b>Youth Professional Seating</b> (under 30)
        </td>
    </tr>
    <tr>
        <td>
            <b><?php echo $row->select_dollarmemyouthprotickets; ?></b>             				            
        </td>
        <td>
            Member Gala Ticket(s) @ $200 each (Under 30)               
        </td>
        <td><b>$ <?php echo $row->dollarmemyouthprotickets; ?></b></td>
    </tr>								
    <tr>
        <td>
            <b><?php echo $row->select_dollaryouthprotickets; ?></b>             					
        </td>
        <td>
            Non-Member Gala Ticket(s) @ $250 each (Under 30)               
        </td>
        <td><b>$ <?php echo $row->select_dollaryouthprotickets; ?></b></td>
    </tr>	
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <font color="blue">I am unable to attend, but would like to contribute to the NIAF Education &amp; Scholarship Program.</font>						
        </td>
        <td><b>$ <?php echo $row->dollarcontribution; ?></b></td>
    </tr>			
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>            
        <td align="right" colspan="2"><font color="blue"><b>TOTAL REMITTED $</b><font></font></font></td>
        <td><b><?php echo $row->x_amount; ?></b></td>					
    </tr>	
    </tbody>
    </table>
    <p><a href="#" class="link-back" paginationFrom="<?php echo $dataMixed['paginationFrom']; ?>" show="<?php echo $dataMixed['show']; ?>">Back</a></p>
    <?php
}
