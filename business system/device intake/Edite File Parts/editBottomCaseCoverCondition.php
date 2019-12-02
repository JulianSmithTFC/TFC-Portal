<?php
if (($ticket['bottomCaseScratches'] == 'No') && ($ticket['bottomCaseDents'] == 'No') && ($ticket['bottomCaseMarks']
        == 'No') && ($ticket['bottomCaseCracks'] == 'No')){
    ?>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#BottomCaseCoverCondition" role="button" aria-expanded="false" aria-controls="BottomCaseCoverCondition">
            Bottom Case Cover Condition
        </a>
    </p>
    <div class="collapse" id="BottomCaseCoverCondition">
        <p align="left" style="font-size: 18px"><b>Bottom Case Cover Condition</b></p>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any scratches?</label>
            <select id="bottomCaseScratches" class="form-control" name="bottomCaseScratches">
                <option selected value="<?= $ticket['bottomCaseScratches'] ?>"><?= $ticket['bottomCaseScratches'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="bottomCaseScratchesInfo"><?= $ticket['bottomCaseDentsInfo'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Dents?</label>
            <select id="bottomCaseDents" class="form-control" name="bottomCaseDents">
                <option selected value="<?= $ticket['bottomCaseDents'] ?>"><?= $ticket['bottomCaseDents'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="bottomCaseDentsInfo"><?= $ticket['bottomCaseDentsInfo'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Marks?</label>
            <select id="bottomCaseMarks" class="form-control" name="bottomCaseMarks">
                <option selected value="<?= $ticket['bottomCaseMarks'] ?>"><?= $ticket['bottomCaseMarks'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="bottomCaseMarksDetails"><?= $ticket['bottomCaseMarksDetails'] ?></textarea>
        </div>
        <div class="form-group col-md-12" align="left">
            <label>Does it have any Cracks?</label>
            <select id="bottomCaseCracks" class="form-control" name="bottomCaseCracks">
                <option selected value="<?= $ticket['bottomCaseCracks'] ?>"><?= $ticket['bottomCaseCracks'] ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Somewhat">Somewhat</option>
            </select>
            <label for="inputComputerIssue">Give us some details about the condition: </label>
            <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="bottomCaseCracksDetails"><?= $ticket['bottomCaseCracksDetails'] ?></textarea>
        </div>
    </div>
    <?php
}
else{
    ?>
    <p align="left" style="font-size: 18px"><b>Bottom Case Cover Condition</b></p>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any scratches?</label>
        <select id="bottomCaseScratches" class="form-control" name="bottomCaseScratches">
            <option selected value="<?= $ticket['bottomCaseScratches'] ?>"><?= $ticket['bottomCaseScratches'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="bottomCaseScratchesInfo"><?= $ticket['bottomCaseDentsInfo'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Dents?</label>
        <select id="bottomCaseDents" class="form-control" name="bottomCaseDents">
            <option selected value="<?= $ticket['bottomCaseDents'] ?>"><?= $ticket['bottomCaseDents'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="bottomCaseDentsInfo"><?= $ticket['bottomCaseDentsInfo'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Marks?</label>
        <select id="bottomCaseMarks" class="form-control" name="bottomCaseMarks">
            <option selected value="<?= $ticket['bottomCaseMarks'] ?>"><?= $ticket['bottomCaseMarks'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="bottomCaseMarksDetails"><?= $ticket['bottomCaseMarksDetails'] ?></textarea>
    </div>
    <div class="form-group col-md-12" align="left">
        <label>Does it have any Cracks?</label>
        <select id="bottomCaseCracks" class="form-control" name="bottomCaseCracks">
            <option selected value="<?= $ticket['bottomCaseCracks'] ?>"><?= $ticket['bottomCaseCracks'] ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="Somewhat">Somewhat</option>
        </select>
        <label for="inputComputerIssue">Give us some details about the condition: </label>
        <textarea class="form-control" id="inputComputerIssue" rows="1" placeholder="Max text 500" name="bottomCaseCracksDetails"><?= $ticket['bottomCaseCracksDetails'] ?></textarea>
    </div>
    <?php
}
?>