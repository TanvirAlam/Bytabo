<div class="progressbar">
            <table class="table submissions-table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Ad No.</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Beskrivning</th>
                        <th>Skapad</th>
                        <th>Status</th>
                        <th>Bytestyp</th>
                        <th>Typ</th>
                        <th style="text-align: center;">Match</th>
                        <th>Åtgärder</th>
                    </tr>
                </thead>
            
                <tbody>
                <?php
                include "functions.php";
                $myAccData = getMyAccData();
            
                foreach($myAccData as $row_data) {
                    $HID = $row_data["HID"];                   
                    $adv_type = $row_data["adv_type"];
                    $address = $row_data["address"];
                    $postno = $row_data["postno"];
                    $description = $row_data["description"];
                    $LID = $row_data["LID"];
                    $BID = $row_data["BID"];
                    $AID = $row_data["AID"];
                    $rent = $row_data["rent"];
                    $stair = $row_data["stair"];
                    $bathroom = $row_data["bathroom"];
                    $room = $row_data["room"];
                    $area = $row_data["area"];
                ?>
                    <tr>
                        <td rowspan="2" style="text-align: center;"><?php echo $HID ?></td>
                        
                        <td class="thumbnail">
                            <a href="../properties/property-detail.html">
                                <img width="80" height="59"
                                     src="../assets/img/property/11.jpg"
                                     class="attachment-admin-thumb" alt="1">
                            </a>
                        </td>
                        <td class="title">
                            <?php echo $address."-<br>".$postno ?>
                        </td>
                        <td class="title">
                            20th St NE
                        </td>
                
                        <td class="post-date">
                            August 12, 2013
                        </td>
                
                        <td class="status">
                            <strong class="publish">Published</strong>
                        </td>
                        
                        <td class="status">
                            <strong class="publish">One-One</strong>
                        </td>
                        <td class="status">
                            <strong class="publish">Har</strong>
                        </td>
                        <td class="status" style="text-align: center;">
                            <strong class="publish">5</strong>
                        </td>
                        <td class="actions">
                            <a href="edit.html" class="edit" title="Edit">Edit</a>
                            <a href="#" class="remove" title="Remove">Remove</a>                
                            <a href="../properties/property-detail.html" class="view" title="View">View</a>                
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img width="80" height="59"
                                     src="../assets/img/property/no-photo.jpg"
                                     class="attachment-admin-thumb" alt="1">                            
                        </td>
                        <td class="title">
                            20th St NE
                        </td>
                        <td class="title">
                            <a href="../properties/property-detail.html">20th St NE</a>
                        </td>
                
                        <td class="post-date">
                            August 12, 2013
                        </td>
                
                        <td class="status">
                            <strong class="publish">Published</strong>
                        </td>
                        <td class="status">
                            <strong class="publish">One-One</strong>
                        </td>
                        <td class="status">
                            <strong class="publish">Vilja</strong>
                        </td>
                        <td class="status" style="text-align: center;">
                            <strong class="publish">2</strong>
                        </td>
                        <td class="actions">
                            <a href="edit.html" class="edit" title="Edit">Edit</a>
                            <a href="#" class="remove" title="Remove">Remove</a>                
                            <a href="../properties/property-detail.html" class="view" title="View">View</a>                
                        </td>
                    </tr>
                    <tr class="sep">
                        <td colspan="8"></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <!--<div class="pagination pagination-centered">
                <ul class="unstyled">
                    <li><a href="#">Previous</a></li>
                    <li><a href="#" class="inactive">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#" class="inactive">3</a>
                    </li>
                    <li><a href="#" class="inactive">4</a>
                    </li>
                    <li><a href="#">Next</a></li>
                    <li><a href="#">Last</a></li>
                </ul>
            </div>-->
            </div>
            