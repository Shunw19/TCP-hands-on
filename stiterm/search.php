<?php include "shared/head.php"; ?>

<form action="result.php" method="POST">
    <table>
        <tr>
            <td>
                <!-- name used to give a variable name to the text in the input box -->
                <input type="text" name="query" placeholder="Please enter your search term">
            </td>
            <td>
                <button type="submit">Search</button>
            </td>
        </tr>
    </table>
</form>
    
<?php include "shared/foot.php"; ?>