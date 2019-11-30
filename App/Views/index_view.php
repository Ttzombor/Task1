<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>#</th>
            <th>Surname</th>
            <th>First Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th class="text ">Option</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
            <td class="text">
                <a class="btn btn-default" href="{{route('blog.admin.posts.edit', $post)}}">
                    <i class="fa fa-edit">Edit</i>
                </a>
                <button type="submit" class="btn" href="{{route('blog.admin.posts.destroy', $post)}}">
                    <i class="fa fa-trash">Delete</i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</div>