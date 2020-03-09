<?php 
http_response_code(418);

$root_url = '.';
$page_title = 'Welcome';
?>
<?php include 'util/components/begin.php'; ?>

<header class="Header MainColumn">
    <h1>I'm a teapot</h1>
    <p>The requested entity body is short and stout.</p>
    <p>Tip me over and pour me out.</p>
</header>

<?php include 'util/components/end.php'; ?>