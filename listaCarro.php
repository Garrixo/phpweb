<?php foreach ($cart_items as $item): ?>
    <tr>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo $item['price']; ?></td>
        <td>
            <a href="?remove_from_cart=<?php echo $item['id']; ?>">Remove</a>
        </td>
    </tr>
<?php endforeach; ?>
