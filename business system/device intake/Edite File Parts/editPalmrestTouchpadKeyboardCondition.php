<?php

if (($ticket['palmrestCondition'] == 'No') && ($ticket['pamlRestDent'] == 'No') && ($ticket['pamlRestMarks'] == 'No')
    && ($ticket['pamlRestCracks'] == 'No')){
    ?>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#PalmrestTouchpadKeyboardCondition" role="button" aria-expanded="false" aria-controls="PalmrestTouchpadKeyboardCondition">
            Palmrest, Touchpad, & Keyboard Condition
        </a>
    </p>
    <div class="collapse" id="PalmrestTouchpadKeyboardCondition">
        <p align="left" style="font-size: 18px"><b>Palmrest, Touchpad, & Keyboard Condition</b></p>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any scratches?</label>
            <select id="palmrestCondition" class="form-control" name="palmrestCondition">
                <option selected value="<?= $ticket['palmrestCondition'] ?>"><?= $ticket['palmrestCondition'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="palmrestConditionDetails"><?= $ticket['palmrestConditionDetails'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Dents?</label>
            <select id="pamlRestDent" class="form-control" name="pamlRestDent">
                <option selected value="<?= $ticket['pamlRestDent'] ?>"><?= $ticket['pamlRestDent'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="pamlRestDentDetails"><?= $ticket['pamlRestDentDetails'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Marks?</label>
            <select id="pamlRestMarks" class="form-control" name="pamlRestMarks">
                <option selected value="<?= $ticket['pamlRestMarks'] ?>"><?= $ticket['pamlRestMarks'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="pamlRestMarksDetails"><?= $ticket['pamlRestMarksDetails'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Cracks?</label>
            <select id="pamlRestCracks" class="form-control" name="pamlRestCracks">
                <option selected value="<?= $ticket['pamlRestCracks'] ?>"><?= $ticket['pamlRestCracks'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="pamlRestCracksDetails"><?= $ticket['pamlRestCracksDetails'] ?></textarea>
        </div>
    </div>
    <?php
}
else{
    ?>
    <p align="left" style="font-size: 18px"><b>Palmrest, Touchpad, & Keyboard Condition</b></p>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any scratches?</label>
        <select id="palmrestCondition" class="form-control" name="palmrestCondition">
            <option selected value="<?= $ticket['palmrestCondition'] ?>"><?= $ticket['palmrestCondition'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="palmrestConditionDetails"><?= $ticket['palmrestConditionDetails'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Dents?</label>
        <select id="pamlRestDent" class="form-control" name="pamlRestDent">
            <option selected value="<?= $ticket['pamlRestDent'] ?>"><?= $ticket['pamlRestDent'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="pamlRestDentDetails"><?= $ticket['pamlRestDentDetails'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Marks?</label>
        <select id="pamlRestMarks" class="form-control" name="pamlRestMarks">
            <option selected value="<?= $ticket['pamlRestMarks'] ?>"><?= $ticket['pamlRestMarks'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="pamlRestMarksDetails"><?= $ticket['pamlRestMarksDetails'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Cracks?</label>
        <select id="pamlRestCracks" class="form-control" name="pamlRestCracks">
            <option selected value="<?= $ticket['pamlRestCracks'] ?>"><?= $ticket['pamlRestCracks'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="pamlRestCracksDetails"><?= $ticket['pamlRestCracksDetails'] ?></textarea>
    </div>
    <?php
}
?>