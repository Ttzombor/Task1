
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <form method="post" action="/user/orderby/" name = "orderBy">

                <select  class="btn btn-sm btn-outline-secondary dropdown-toggle" style="height: 31px"
                onchange="javascript:this.form.submit()" name="orderBy">
                    <option value="" selected disabled hidden>Order By</option>
                    <option value="id">Id</option>
                    <option value="firstname">Name</option>
                    <option value="surname">Surname</option>
                </select>
            </form>
            <form method="post" action="/user/create" >
            <button type="submit" class="btn btn-sm btn-outline-secondary" >Create User</button>
            </form>



            <form action="/user/export" method="post" name="upload_excel"
                  enctype="multipart/form-data">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Export</button>
            </form>
            <a href="/user/filemanager" class="btn btn btn-outline-secondary w-auto " style="height: 31px">
                Import
            </a>

        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>#</th>
            <th>Surname</th>
            <th>First Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th class="text ">Options</th>

        </tr>
        </thead>
        <tbody>
        <?php /**
         * Passing $data from View.php to show all Users
         * @param $data
         */
            foreach($data as $var){
            echo '<tr >';
            echo '<td>'.$var['id'].'</td>';
            echo '<td>'.$var['surname'].'</td>';
            echo '<td>'.$var['firstname'].'</td>';
            echo '<td>'.$var['phone'].'</td>';
            echo '<td>'.$var['address'].'</td>';
            echo '<td >
        <form method="POST" action="/user/edit/'.$var['id'].'">  
         <button type="submit" class="btn"  value="edit">
             
                    <i>Edit</i>
                    <input type="text" value='.$var['id'].' name="id" hidden/>
               
                </button>
                </form>
                </td>
                <td>
             <form method="POST" action="/user/delete">   <button type="submit" class="btn"  value="Delete">
                    <i >Delete</i>
                    <input type="text" value='.$var['id'].' name="id" hidden/>
                </button>
                </form>
            </td>
        
            
        </tr>';}?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">
                <ul class="pagination pull-right">
                    <!--{{$paginator->links()}}-->
                </ul>

            </td>
        </tr>
        </tfoot>
    </table>
</div>