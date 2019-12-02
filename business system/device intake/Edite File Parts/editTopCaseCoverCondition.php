<?php
if (($ticket['topCaseCondition'] == 'No') && ($ticket['topCaseDents'] == 'No') && ($ticket['topCaseMarks'] == 'No')
    && ($ticket['topCaseCracks'] == 'No')){
    ?>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#TopCaseCoverCondition" role="button" aria-expanded="false" aria-controls="TopCaseCoverCondition">
            Top Case Cover Condition
        </a>
    </p>
    <div class="collapse" id="TopCaseCoverCondition">
        <p align="left" style="font-size: 18px"><b>Top Case Cover Condition</b></p>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any scratches?</label>
            <select id="topCaseCondition" class="form-control" name="topCaseCondition">
                <option selected value="<?= $ticket['topCaseCondition'] ?>"><?= $ticket['topCaseCondition'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="topCaseDetails"><?= $ticket['topCaseDetails'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Dents?</label>
            <select id="topCaseDents" class="form-control" name="topCaseDents">
                <option selected value="<?= $ticket['topCaseDents'] ?>"><?= $ticket['topCaseDents'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="topCaseDentConditionDetails"><?= $ticket['topCaseDentConditionDetails'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Marks?</label>
            <select id="topCaseMarks" class="form-control" name="topCaseMarks">
                <option selected value="<?= $ticket['topCaseMarks'] ?>"><?= $ticket['topCaseMarks'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="topCaseMarksInfo"><?= $ticket['topCaseMarksInfo'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Cracks?</label>
            <select id="topCaseCracks" class="form-control" name="topCaseCracks">
                <option selected value="<?= $ticket['topCaseCracks'] ?>"><?= $ticket['topCaseCracks'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="topCaseCracksInfo"><?= $ticket['topCaseCracksInfo'] ?></textarea>
        </div>
    </div>
    <?php
}
else{
    ?>
    <p align="left" style="font-size: 18px"><b>Top Case Cover Condition</b></p>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any scratches?</label>
        <select id="topCaseCondition" class="form-control" name="topCaseCondition">
            <option selected value="<?= $ticket['topCaseCondition'] ?>"><?= $ticket['topCaseCondition'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="topCaseDetails"><?= $ticket['topCaseDetails'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Dents?</label>
        <select id="topCaseDents" class="form-control" name="topCaseDents">
            <option selected value="<?= $ticket['topCaseDents'] ?>"><?= $ticket['topCaseDents'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="topCaseDentConditionDetails"><?= $ticket['topCaseDentConditionDetails'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Marks?</label>
        <select id="topCaseMarks" class="form-control" name="topCaseMarks">
            <option selected value="<?= $ticket['topCaseMarks'] ?>"><?= $ticket['topCaseMarks'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="topCaseMarksInfo"><?= $ticket['topCaseMarksInfo'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Cracks?</label>
        <select id="topCaseCracks" class="form-control" name="topCaseCracks">
            <option selected value="<?= $ticket['topCaseCracks'] ?>"><?= $ticket['topCaseCracks'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="topCaseCracksInfo"><?= $ticket['topCaseCracksInfo'] ?></textarea>
    </div>
    <?php
}
?>