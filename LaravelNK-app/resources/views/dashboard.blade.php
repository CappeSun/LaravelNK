<?php

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Site;
use App\Models\Punishment;

?>

<p>Hello there, <?= $name; ?>!</p>
<form method="post" action="/logout">
    <button type="submit">Logout</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
<h3>Sites</h3>
<div>
    <?php foreach (Site::all() as $site){ ?>
        <div>
            <h4><?= $site->name; ?></h4>
            <a href="<?= $site->url; ?>"><?= $site->url; ?></a>
            <p><?= Punishment::find($site->punishment_id)->name; ?></p>
            <form method="post" action="/sites/update/<?= $site->id; ?>">
                <div>
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text">
                </div>
                <div>
                    <label for="url">Url</label>
                    <input name="url" id="url" type="text">
                </div>
                <div>
                    <label for="punishment">Punishment</label>
                    <select name="punishment" id="punishment">
                        <?php foreach(Punishment::all() as $punishment){ ?>
                            <option value="<?= $punishment->id; ?>"><?= $punishment->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit">Update</button>
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            <form method="post" action="/sites/delete/<?= $site->id; ?>">
                <button>Delete</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    <?php } ?>
</div>
<h3>Add Site</h3>
<form method="post" action="/sites/add">
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text">
    </div>
    <div>
        <label for="url">Url</label>
        <input name="url" id="url" type="text">
    </div>
    <div>
        <label for="punishment">Punishment</label>
        <select name="punishment" id="punishment">
            <?php foreach(Punishment::all() as $punishment){ ?>
                <option value="<?= $punishment->id; ?>"><?= $punishment->name; ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit">Add</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
<h3>Punishments</h3>
<?php foreach(Punishment::all() as $punishment){ ?>
    <span><?= $punishment->name; ?></span>
    <form method="post" action="/punishments/delete/<?= $punishment->id; ?>">
        <button>Delete</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
<?php } ?>
<h3>Add Punishment</h3>
<form method="post" action="/punishments/add">
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text">
    </div>
    <button type="submit">Add</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
<?= $errors->first('desc'); ?>