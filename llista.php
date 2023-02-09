<?php foreach ($phone_cases as $phone_case): ?>
    <tr>
        <td><?php echo $phone_case['name']; ?></td>
        <td><?php echo $phone_case['price']; ?></td>
        <td>
            <a href="?add_to_cart=<?php echo $phone_case['id']; ?>">Add to Cart</a>
        </td>
    </tr>
<?php endforeach; ?>
