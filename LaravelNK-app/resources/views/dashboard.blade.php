<?php

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Site;
use App\Models\Punishment;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="loginCont">
        <h4>Hello there, <?= $name; ?>!</h4>
        <form method="post" action="/logout">
            <button type="submit">Logout</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
    <div class="sitesCont">
        <h3>Sites</h3>
        <div>
            <?php foreach (Site::all() as $site){ ?>
                <div>
                    <h4><?= $site->name; ?></h4>
                    <a href="<?= $site->url; ?>"><?= $site->url; ?></a>
                    <p>Punishment: <?= Punishment::find($site->punishment_id)->name; ?></p>
                    <h4>Update Site</h4>
                    <form method="post" action="/sites/update/<?= $site->id; ?>">
                        <div>
                            <label for="updSiteName">Name</label>
                            <input name="updSiteName" id="updSiteName" type="text">
                            <span><?= $errors->first('updSiteName'); ?></span>
                        </div>
                        <div>
                            <label for="updUrl">Url</label>
                            <input name="updUrl" id="updUrl" type="text">
                            <span><?= $errors->first('updUrl'); ?></span>
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
    </div>
    <div class="addSiteCont">
        <h3>Add Site</h3>
        <form method="post" action="/sites/add">
            <div>
                <label for="name">Name</label>
                <input name="siteName" id="siteName" type="text">
                <span><?= $errors->first('siteName'); ?></span>
            </div>
            <div>
                <label for="url">Url</label>
                <input name="url" id="url" type="text">
                <span><?= $errors->first('url'); ?></span>
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
    </div>
    <div class="punishmentsCont">
        <h3>Punishments</h3>
        <?php foreach(Punishment::all() as $punishment){ ?>
            <div>
                <span><?= $punishment->name; ?></span>
                <form method="post" action="/punishments/delete/<?= $punishment->id; ?>">
                    <button>Delete</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        <?php } ?>
    </div>
    <div class="addPunishmentsCont">
        <h3>Add Punishment</h3>
        <form method="post" action="/punishments/add">
            <div>
                <label for="name">Name</label>
                <input name="name" id="name" type="text">
                <?= $errors->first('name'); ?>
            </div>
            <button type="submit">Add</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</body>
</html>