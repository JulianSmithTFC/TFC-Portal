<?php
if (($ticket['ScreenScratches'] == 'No') && ($ticket['ScreenDents'] == 'No') && ($ticket['ScreenMarks'] == 'No') && ($ticket['ScreenCracks'] == 'No')){
    ?>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#ScreenCondition" role="button" aria-expanded="false" aria-controls="ScreenCondition">
            Screen Condition
        </a>
    </p>
    <div class="collapse" id="ScreenCondition">
        <p align="left" style="font-size: 18px"><b>Screen Condition</b></p>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any scratches?</label>
            <select id="ScreenScratches" class="form-control" name="ScreenScratches">
                <option selected value="<?= $ticket['ScreenScratches'] ?>"><?= $ticket['ScreenScratches'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="detailsAboutScreenScratches"><?= $ticket['detailsAboutScreenScratches'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Dents?</label>
            <select id="ScreenDents" class="form-control" name="ScreenDents">
                <option selected value="<?= $ticket['ScreenDents'] ?>"><?= $ticket['ScreenDents'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="ScreenDentsDetails"><?= $ticket['ScreenDentsDetails'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Marks?</label>
            <select id="ScreenMarks" class="form-control" name="ScreenMarks">
                <option selected value="<?= $ticket['ScreenMarks'] ?>"><?= $ticket['ScreenMarks'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="ScreenMarksDetails"><?= $ticket['ScreenMarksDetails'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Cracks?</label>
            <select id="ScreenCracks" class="form-control" name="ScreenCracks">
                <option selected value="<?= $ticket['ScreenCracks'] ?>"><?= $ticket['ScreenCracks'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="ScreenCracksDetails"><?= $ticket['ScreenCracksDetails'] ?></textarea>
        </div>
    </div>
    <?php
}
else{
    ?>
    <p align="left" style="font-size: 18px"><b>Screen Condition</b></p>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any scratches?</label>
        <select id="ScreenScratches" class="form-control" name="ScreenScratches">
            <option selected value="<?= $ticket['ScreenScratches'] ?>"><?= $ticket['ScreenScratches'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="detailsAboutScreenScratches"><?= $ticket['detailsAboutScreenScratches'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Dents?</label>
        <select id="ScreenDents" class="form-control" name="ScreenDents">
            <option selected value="<?= $ticket['ScreenDents'] ?>"><?= $ticket['ScreenDents'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="ScreenDentsDetails"><?= $ticket['ScreenDentsDetails'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Marks?</label>
        <select id="ScreenMarks" class="form-control" name="ScreenMarks">
            <option selected value="<?= $ticket['ScreenMarks'] ?>"><?= $ticket['ScreenMarks'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="ScreenMarksDetails"><?= $ticket['ScreenMarksDetails'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Cracks?</label>
        <select id="ScreenCracks" class="form-control" name="ScreenCracks">
            <option selected value="<?= $ticket['ScreenCracks'] ?>"><?= $ticket['ScreenCracks'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="ScreenCracksDetails"><?= $ticket['ScreenCracksDetails'] ?></textarea>
    </div>
    <?php
}
?>