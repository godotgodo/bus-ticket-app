<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Delete
</button> -->
<div class="modal fade" id=<?= $modal_id ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <?= $title ?> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= $content ?>
            </div>
            <div class="modal-footer">
                <form action="<?= $endpoint ?>" method="<?= $method ?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $close ?></button>
                    <input type="submit" class="btn btn-primary" value="<?= $confirm ?>" />
                </form>
            </div>
        </div>
    </div>
</div>