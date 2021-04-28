<div class=" container-40">
   <div class="container">
       <a href="/create" class="btn btn-primary float-end">Create New Post</a>
       <br>
       <br>
       <h2 class="text-center m-4">All Posts</h2>
       <table class="table table-striped table-condensed table-bordered">
           <thead>
           <tr class="table-dark">
               <th scope="col">ID</th>
               <th scope="col">Title</th>
               <th scope="col">Category</th>
               <th scope="col">Tags</th>
               <th scope="col">Actions</th>
           </tr>
           </thead>
           <tbody>
           <?php foreach ($data as $post):; ?>
               <tr >
                   <th scope="row"><?php echo $post['id'] ?></th>
                   <td><?php echo $post['title'] ?></td>
                   <td><?php echo $post['category'] ?></td>
                   <td><?php echo $post['tags'] ?></td>
                   <td><a href="/edit/<?php echo $post['id']; ?>" class="btn btn-info float-start me-1">Edit</a>
                       <form action="/delete/<?php echo $post['id']; ?>">
                           <button class="btn btn-danger float-start">Delete</button>
                       </form></td>
               </tr>
           <?php endforeach; ?>
           </tbody>
       </table>
   </div>
</div>
