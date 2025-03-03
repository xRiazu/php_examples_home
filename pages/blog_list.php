<?php
include 'database/config.php';
include 'components/header.php';

$blogs = $conn->prepare("SELECT
  bID,
  title,
  context,
  bStatus,
  image_url,
  created_at
FROM blogs
WHERE bStatus ='published' ");
$blogs->execute();
$blogs->store_result();
$blogs->bind_result($blogID, $blogTitle, $blogContent, $blogStatus, $blogIMG, $created);
?>

<div class="bg-gray-100 md:px-10 px-4 py-12 font-[sans-serif]">
      <div class="max-w-5xl max-lg:max-w-3xl max-sm:max-w-sm mx-auto">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Latest Blog Posts</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-sm:gap-8">
        <?php while($blogs->fetch()) : ?>
              <?php 
              $date = new DateTime($created);
              $formattedDate = $date->format("F j, Y, g:i A");
              ?>
          <div class="bg-white rounded overflow-hidden">
            <div class="bg-white rounded overflow-hidden">  
            <img src="<?=ROOT_DIR?>assets/images/<?= $blogIMG ?>" alt="Blog Post 3" class="w-full h-52 object-cover" />
            <div class="p-6">
              <h3 class="text-lg font-bold text-gray-800 mb-3"><?= $blogTitle ?></h3>
              <p class="text-gray-500 text-sm ellipsis"><?= $blogContent ?></p>
              <p class="text-orange-500 text-[13px] font-semibold mt-4"><?= $formattedDate ?></p>
              <a href="blogInfo?bid=<?=$blogID?>" class="mt-4 inline-block px-4 py-2 rounded tracking-wider bg-orange-500 hover:bg-orange-600 text-white text-[13px]">Read More</a>
            </div>
          </div>
          
        </div>
        <?php endwhile ?>
      </div>
    </div>

<?php
include 'components/banner.php';
include 'components/footer.php';
?>