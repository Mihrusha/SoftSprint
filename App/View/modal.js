 const newPost = (post, addedAt = Date()) => Object={
    ...post,addedAt,
 }

 const firstPost = {
    id:1,
    autor:'Misha',
 }

 

 console.log(newPost(firstPost));
        