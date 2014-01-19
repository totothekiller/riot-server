<!-- File: /app/View/Channels/index.ctp -->
<?php
    // Add BreadCrumb
    $this->Html->addCrumb('Channels', '/Channels');

    // Select Active Menu
    $this->set('activeMenu', 'channels');
?>
<h2>List of Channels</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
    </thead>

    <?php foreach ($channels as $channel): ?>
    <tr>
        <td><?php echo $channel['Channel']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($channel['Channel']['name'],
					array('controller' => 'channels', 'action' => 'view', $channel['Channel']['id'])); ?>
        </td>
        <td><?php echo $channel['Channel']['description']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($channel); ?>
</table>

<p><?php echo $this->Html->link('Add Channel',array('controller' => 'channels', 'action' => 'add')); ?></p>
