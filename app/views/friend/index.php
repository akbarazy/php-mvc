<div class="container mt-5 pt-4">
    <h1>All Friends</h1>

    <button type="button" class="btn btn-outline-success mb-3 addFriend" data-toggle="modal" data-target="#formModal">
        New Friend
    </button>

    <form action="<?php echo BASEURL; ?>/friend/search" method="post">
        <div class="input-group mb-3 pb-1">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search your friend" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
            </div>
        </div>
    </form>

    <?php Flasher::flash(); ?>

    <ul class="p-0 list-group">
        <?php foreach ($data['friends'] as $friend) : ?>
            <li class="list-group-item">
                <h5 class='font-weight-normal mb-0' style='display: inline-block;'>
                    <?php echo "{$friend['name']} | {$friend['age']}"; ?>
                </h5>

                <a href="<?php echo BASEURL; ?>/friend/delete/<?php echo $friend['id']; ?>" class="badge badge-danger badge-pill float-right ml-2" style="padding-bottom: 0.375rem;">
                    Delete
                </a>
                <a href="<?php echo BASEURL; ?>/friend/detail/<?php echo $friend['id']; ?>" class="badge badge-success badge-pill float-right" style="padding-bottom: 0.375rem;">
                    Details
                </a>
                <a href="<?php echo BASEURL; ?>/friend/edit/<?php echo $friend['id']; ?>" class="badge badge-success badge-pill float-right mr-2 editFriend" style="padding-bottom: 0.375rem;" data-toggle="modal" data-target="#formModal" data-id="<?php echo $friend['id']; ?>">
                    Edit
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">New Friend</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?php echo BASEURL; ?>/friend/add" method="post">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="1" aria-describedby="emailHelp" placeholder="Enter age">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add Now</button>
                </form>
            </div>
        </div>
    </div>
</div>