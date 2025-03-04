<?php
include 'database/config.php';
include 'components/header.php';

$blogID = $_GET['bid'];
$userID = isset($_SESSION['id']) ? $_SESSION['id'] : null;

$blogs = $conn->prepare("SELECT
b.title,
b.image_url,
b.context,
b.bStatus,
b.created_at,
u.firstname,
u.lastname
FROM blogs b
INNER JOIN users u ON b.uID = u.uID
WHERE b.bID = $blogID
");
$blogs->execute();
$blogs->store_result();
$blogs->bind_result($blogTitle, $blogIMG, $blogContent, $blogStatus, $created, $firstname, $lastname);
$blogs->fetch();

// blog comments //
$blog_comments = $conn->prepare("SELECT
bc.content,
bc.created_at,
u.username
FROM blog_comments bc
INNER JOIN users u ON bc.userID = u.uID
WHERE bc.blogID = $blogID
");
$blog_comments->execute();
$blog_comments->store_result();
$blog_comments->bind_result($comment, $commentCreated, $username);


$date = new DateTime($created);
$formattedDate = $date->format("F j, Y, g:i A");
?>

<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white"><?= $blogTitle ?></h1>
         <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="<?= ROOT_DIR ?>assets/images/<?= $blogIMG ?>"alt="">
             <div class="flex flex-col">
             <?php if (isset($_SESSION['status_message'])) : ?>
            <div class="status-message"><?= $_SESSION['status_message'] ?></div>
          <?php unset($_SESSION['status_message']) ?>
          <?php endif ?>
              <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                  <p href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white md:text-3xl">
                  <?= $blogTitle ?>                
                  </p>

                  <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                      <?= $blogContent ?>
                  </p> 
                  <div class="flex items-center mt-6">
                      <img class="object-cover object-center w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="">

                      <div class="mx-4">
                          <h1 class="text-sm text-gray-700 dark:text-gray-200"><?= $firstname . ' ' . $lastname ?></h1>
                          <p class="text-sm text-gray-500 dark:text-gray-400"><?= $formattedDate ?></p>
                      </div>
                  </div>
              </div>
              <?php if(isset($_SESSION['id'])) : ?>
              <div class="mt-20">
                <form action="commentController?bid=<?= $blogId ?>&uid=<?=$userId?>" method="post">
                <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Comment on <?= $blogTitle ?></label>
                  <textarea id="comment" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your comment..."></textarea>
                  <button type="submit" class="relative inline cursor-pointer text-xl font-medium before:bg-violet-600  before:absolute before:-bottom-1 before:block before:h-[2px] before:w-full before:origin-bottom-right before:scale-x-0 before:transition before:duration-300 before:ease-in-out hover:before:origin-bottom-left hover:before:scale-x-100">Submit Comment</button>
                  <p class="mt-5">Your comment will appear once approved by admin</p>
                </form>
                <?php else : ?>
                  <p>Please sign in to comment on this blog</p>
              </div>
              <?php endif ?>
            </div>
        </div>
        
    </div>
<div class="flex justify-center relative top-1/3">
  <?php if ($blog_comments->num_rows == 0) : ?>
    <p class="mt-20">No comments have been left yet </p>
    <?php else : ?>
  <?php while($blog_comments->fetch()) : ?>
<div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
    <div class="relative flex gap-4">
        <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
        <div class="flex flex-col w-full">
            <div class="flex flex-row justify-between">
                <p class="relative text-xl whitespace-nowrap truncate overflow-hidden"><?= $firstname ?></p>
                <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
            </div>
            <p class="text-gray-400 text-sm"><?= $commentCreated ?></p>
        </div>
    </div>
    <p class="-mt-4 text-gray-500"><?= $comment ?></p>
</div>
<?php endwhile ?>
<?php endif ?>

</div>
</section>

<?php if (isset($_SESSION['id'])): ?>
    <form action="commentController.php" method="POST">
        <input type="hidden" name="blogID" value="<?= $blogID; ?>">
        <textarea name="comment" required></textarea>
        <button type="submit">Submit Comment</button>
    </form>
<?php else: ?>
    <p>You must <a href="login.php">log in</a> to comment.</p>
<?php endif; ?>


<?php
include 'components/footer.php';
?>