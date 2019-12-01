<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <form action="user/create_view.php">
            <button type="submit" class="btn btn-sm btn-outline-secondary" >Create User</button>
            </form>
            <button type="button" class="btn btn-sm btn-outline-secondary">Import</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>

        </div>
        <select  class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            <option>This month</option>
            <option>Last quartet</option>
        </select>
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
        <?php foreach($data as $var){
            echo '<tr>';
            echo '<td>'.$var['id'].'</td>';
            echo '<td>'.$var['surname'].'</td>';
            echo '<td>'.$var['firstname'].'</td>';
            echo '<td>'.$var['phone'].'</td>';
            echo '<td>'.$var['address'].'</td>';
            echo '<td >
                <a class="btn btn-default" href="/user/edit">
                    <i>Edit</i>
                </a>
                <button type="submit" class="btn" href="/user/delete">
                    <i >Delete</i>
                </button>
            </td>
        </tr>
            
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