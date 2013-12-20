<!-- File: /app/View/Channels/index.ctp -->
<?php
    // Add BreadCrumb
    $this->Html->addCrumb('Channels', '/Channels');
?>
<h1>List of Channels</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
    </tr>


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

<h1><?php echo $this->Html->link('Add Channel',array('controller' => 'channels', 'action' => 'add')); ?></h1>