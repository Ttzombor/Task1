
<form method="POST" action="/user/update" name="update">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                        </li>
                    </ul>
                    <br>

                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="">Surname</label>
                                <input type="text"
                                       class="form-control"
                                       name="surname"
                                       value="<?php
                                       /** Passing to Edit_view params for editing them
                                        * @param $data
                                        */
                                        echo $data[0]['surname'];
                                       ?>" required>
                                <input name="update" value="1" hidden/>
                                <input name="id" value="<?php echo $data[0]['id'];?>" hidden/>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text"
                                       class="form-control"
                                       name="firstname"
                                       value="<?php
                                       /**
                                        * @param $data
                                        */
                                       echo $data[0]['firstname']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text"
                                       class="form-control"
                                       name="phone"
                                       placeholder="User's phone..."
                                       value="<?php
                                       /**
                                        * @param $data
                                        */ echo $data[0]['phone'];?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text"
                                       class="form-control"
                                       name="address"
                                       placeholder="No address..."
                                       value="<?php
                                       /**
                                        * @param $data
                                        */ echo $data[0]['address'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit" value="edit">Save</button>
</form>

