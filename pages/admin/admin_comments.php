<?php
//include database config and header
include 'database/config.php';
include 'components/header.php';

$comments = $conn->prepare("SELECT
bc.blogID,
bc.content,
bc.created_at,
bc.status,
u.firstname,
b.title,
b.image_url
FROM blog_comments bc
INNER JOIN users u ON bc.userID = u.uID
INNER JOIN blogs b ON bc.blogID = b.uID
ORDER BY 
    CASE 
        WHEN bc.status = 'pending' THEN 1 
        WHEN bc.status = 'approved' THEN 2 
        WHEN bc.status = 'rejected' THEN 3 
    END");
$comments->execute(); // Execute the query
$comments->store_result(); // Store the result for later use
$comments->bind_result($commentId, $comment, $created, $commentStatus, $firstname, $blogName, $blogImg); // Bind the results to variables
?>

<section class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <!-- Section heading -->
        <h2 class="text-center text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
            All comments from users
        </h2>

        <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
            <!-- Loop through each comment -->
            <?php while ($comments->fetch()) : ?>
                <blockquote class="rounded-lg bg-gray-50 p-6 shadow-xs sm:p-8">
                    <div class="flex items-center gap-4">
                        <!-- Display blog image -->
                        <img
                            alt=""
                            src="<?= ROOT_DIR ?>assets/images/<?= htmlspecialchars($blogImg) ?>"
                            class="size-14 rounded-full object-cover" />

                        <div>
                            <!-- Display blog title -->
                            <p class="mt-0.5 text-lg font-medium text-gray-900"><?= htmlspecialchars($blogName) ?></p> <!-- Escape blog name -->
                        </div>
                    </div>

                    <!-- Display the comment content -->
                    <p class="mt-4 text-gray-700">
                        <?= htmlspecialchars($comment) ?> <!-- Escape comment content -->
                    </p>
                    <div>
                        <!-- Display the first name of the commenter -->
                        <p class="mt-4 text-gray-700">Comment by <?= htmlspecialchars($firstname) ?></p> <!-- Escape first name -->
                    </div>

                    <!-- Display the status of the comment (pending, approved, rejected) with appropriate styling -->
                    <span class="inline-flex items-center justify-center rounded-full px-2.5 py-0.5 text-emerald-700 <?php if ($commentStatus === 'pending') : ?>bg-yellow-100 <?php elseif ($commentStatus === 'rejected') : ?> bg-red-100 <?php elseif ($commentStatus === 'approved') : ?> bg-emerald-100 <?php endif ?>">
                        <p class="whitespace-nowrap text-sm"><?= htmlspecialchars($commentStatus) ?></p> <!-- Escape blog status -->
                    </span>

                    <!-- Display buttons to approve or reject the comment depending on its status -->
                    <div>
                        <span class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-xs">
                            <?php if($commentStatus === 'pending') : ?>
                            <!-- Approve and Reject buttons for 'pending' status -->
                             <!-- Use urlencode to escape comment ID in URL -->
                            <button  onclick="window.location.href='approve?cid=<?= urlencode($commentId) ?>'" 
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                Approve
                            </button>

                            <button
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                Reject
                            </button>
                            <?php elseif($commentStatus === 'rejected') : ?>
                            <!-- Approve button for 'rejected' status -->
                            <button  onclick="window.location.href='approve?cid=<?= urlencode($commentId) ?>'"
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                Approve
                            </button>
                            <?php elseif($commentStatus === 'approved') : ?>
                            <!-- Reject button for 'approved' status -->
                            <button
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                Reject
                            </button>
                            <?php endif ?>
                        </span>
                    </div>
                </blockquote>
            <?php endwhile ?>

        </div>
    </div>
</section>

<?php
// Include the footer
include 'components/footer.php';
?>