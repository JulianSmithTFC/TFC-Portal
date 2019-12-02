<?php

include '../../config.php';

$queryTicket = "SELECT * FROM ticket WHERE uid = ('$uid') ORDER BY ticketID DESC";
$resultTicket = mysqli_query($conn, $queryTicket);
$ticketCount = mysqli_num_rows($resultTicket);

$queryQuotes = "SELECT * FROM quotes WHERE uid = ('$uid') ORDER BY quoteID DESC";
$resultQuotes = mysqli_query($conn, $queryQuotes);
$quoteCount = mysqli_num_rows($resultQuotes);

$conn->close();

?>
    <!-- Modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if($ticketCount > 0){
                        ?>
                        <div>
                            <h2>Intake Tickets</h2>
                            <?php
                            while ($ticket = mysqli_fetch_array($resultTicket)) {
                                ?>
                                <div>
                                    <h4><?php echo $ticket['computerDes'] ?></h4>
                                    <p><?php echo $ticket['computerIsu'] ?></p>
                                    <a href="../../device intake/editFormIntake.php?id=<?php echo $ticket["ticketID"] ?>">
                                        <b class="btn btn-primary">Open Ticket</b>
                                    </a>
                                </div>
                                <?php
                            }
                            if($quoteCount > 0){
                                ?>
                                <div>
                                    <h2>Quotes</h2>
                                    <?php
                                    while ($quote = mysqli_fetch_array($resultQuotes)) {
                                        ?>
                                        <div>
                                            <h4>Quote #<?php echo $quote['quoteID'] ?></h4>
                                            <p>Quote Total <?php echo $quote['quoteTotal'] ?></p>
                                            <a href="../../quote system/editFormQuote.php?id=<?php echo$quote["quoteID"] ?>">
                                                <b class="btn btn-primary">Open Quote</b>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php


