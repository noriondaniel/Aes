<div class="ballots view">
<h2>User</h2>
    <dl>
        <dt><?= __('Client') ?></dt>
        <dd>
            <?= $this->Number->format($ballot->client->id) ?>
            &nbsp;
        </dd>
        
        <dt><?= __('Id') ?></dt>
        <dd>
            <?= $this->Number->format($ballot->id) ?>
            &nbsp;
        </dd>
        <dt><?= __('Created') ?></dt>
        <dd>
            <?= h($ballot->created) ?>
            &nbsp;
        </dd>
        <dt><?= __('Modified') ?></dt>
        <dd>
            <?= h($ballot->modified) ?>
            &nbsp;
        </dd>
    </dl>

    <div class="related">
        <h2>Compras</h2>
        <?php if (!empty($ballot->purchases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
            </tr>
            <?php foreach ($ballot->purchases as $purchases): ?>
            <tr>
                <td><?= h($purchases->product_id) ?></td>
                <td><?= h($purchases->created) ?></td>
                <td><?= h($purchases->modified) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>