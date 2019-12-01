
<form method="POST" action="/user/update">
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
                                       name="title"
                                       placeholder="User's surname"
                                       value="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text"
                                       class="form-control"
                                       name="title"
                                       placeholder="User's name"
                                       value="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number"
                                       class="form-control"
                                       name="phone"
                                       placeholder="User's phone..."
                                       value=""
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="address"
                                       class="form-control"
                                       name="title"
                                       placeholder="User's address..."
                                       value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
</form>

