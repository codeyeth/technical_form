<div class="form-group">
    
    {!! Form::open(['action' => 'TechRequestController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ,
    'autocomplete' => 'off', 'class' => 'create-twoot-panel' ]) !!}
    @csrf
    
    <label for="newTwootType"><strong>REQUESTING EMPLOYEE:</strong>
        <span class="required"> *</span>
    </label>
    <input type="text" class="form-control" id="reqEmp" name="reqEmp" required wire:model="empName" />
    <br>
    <label for="newTwootType"><strong>REQUESTING DIVISION:</strong>
        <span class="required"> *</span>
    </label>
    <select id="reqDiv" name="reqDiv" class="form-control" required>
        <option value="">Select Division Here</option>
        <option value="Directors Office">Directors Office</option>
        <option value="Administrative Division">Administrative Division</option>
        <option value="Production Planning and Control Division">Production Planning and Control Division</option>
        <option value="Composing Division">Composing Division</option>
        <option value="Press Division">Press Division</option>
        <option value="Finishing Division">Finishing Division</option>
        <option value="Engineering Division">Engineering Division</option>
        <option value="Financial and Management Division">Financial and Management Division</option>
        <option value="Sales and Management Division">Sales and Management Division</option>
        <option value="Photolithographic Division">Photolithographic Division</option>
    </select>
    <br>
    <label for="newTwootType"><strong>PROBLEM CATEGORY:</strong>
        <span class="required"> *</span>
    </label>
    <select id="probCat" name="probCat" class="form-control" required>
        <option value="">Select Category Here</option>
        <option value="Hardware"> Hardware </option>
        <option value="Software"> Software </option>
        <option value="Network"> Network </option>
        <option value="Internet"> Internet </option>
        <option value="Website"> Website </option>
        <option value="Website"> Multimedia Art </option>
        <option value="Others"> Others </option>
    </select>
    
    <br>
    
    <label for="newTwoot"><strong>BRIEF SUMMARY OF TECHNICAL <br /> ISSUE/S CONCERN: MAX CHARACTER ( {{ strlen($description) }} / 180 )</strong>
    </label>
    <textarea id="description" name="description" rows="5" class="form-control" maxlength="180" wire:model="description"></textarea>
    
    <br>
    
    <button class="btn btn-primary">SUBMIT TECH REQUEST</button>
    
    {!! Form::close() !!}
    
</div>