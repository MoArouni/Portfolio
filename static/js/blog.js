document.addEventListener('DOMContentLoaded', function() {
    // Post like buttons
    const likeButtons = document.querySelectorAll('.like-button');
    const isLoggedIn = document.querySelector('.blog-container')?.dataset.loggedIn === "1";
    
    // Create or get anonymous user identifier
    let anonymousId = localStorage.getItem('anonymous_user_id');
    if (!anonymousId && !isLoggedIn) {
        anonymousId = 'anon_' + Math.random().toString(36).substring(2, 15);
        localStorage.setItem('anonymous_user_id', anonymousId);
    }
    
    // Track posts liked by anonymous users
    let anonymousLikes = JSON.parse(localStorage.getItem('anonymous_likes') || '[]');
    
    // Apply anonymous likes from localStorage on page load
    if (!isLoggedIn) {
        likeButtons.forEach(button => {
            const postId = button.getAttribute('data-post-id');
            if (anonymousLikes.includes(parseInt(postId))) {
                toggleLikeUI(button, true);
            }
        });
    }
    
    likeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const postId = parseInt(this.getAttribute('data-post-id'));
            const liked = this.classList.contains('liked');
            const likeCountElement = this.querySelector('.like-count');
            
            if (isLoggedIn) {
                // Logged in user like/unlike handling
                handleLikeAction(this, postId, liked, likeCountElement);
            } else {
                // Anonymous user handling
                if (liked) {
                    // Can't unlike as anonymous user
                    alert('Anonymous users cannot remove their likes');
                } else if (!anonymousLikes.includes(postId)) {
                    // Prompt for name and like
                    const username = prompt('Please enter your name for the like:', 'Anonymous');
                    if (username) {
                        handleAnonymousLike(this, postId, username, likeCountElement);
                    }
                } else {
                    alert('You have already liked this post');
                }
            }
        });
    });
    
    // Function to handle regular like/unlike actions
    function handleLikeAction(button, postId, liked, likeCountElement) {
        // UI update
        toggleLikeUI(button, !liked);
        likeCountElement.textContent = parseInt(likeCountElement.textContent) + (liked ? -1 : 1);
        
        // API call
        const url = liked ? `/post/unlike/${postId}` : `/post/like/${postId}`;
        fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                likeCountElement.textContent = data.like_count;
            } else {
                // Revert on failure
                toggleLikeUI(button, liked);
                likeCountElement.textContent = parseInt(likeCountElement.textContent) + (liked ? 1 : -1);
            }
        })
        .catch(error => {
            // Revert on error
            toggleLikeUI(button, liked);
            likeCountElement.textContent = parseInt(likeCountElement.textContent) + (liked ? 1 : -1);
        });
    }
    
    // Helper function to toggle like UI state
    function toggleLikeUI(button, isLiked) {
        if (isLiked) {
            button.classList.add('liked');
            button.querySelector('i').classList.replace('far', 'fas');
        } else {
            button.classList.remove('liked');
            button.querySelector('i').classList.replace('fas', 'far');
        }
    }
    
    // Function to handle anonymous likes
    function handleAnonymousLike(button, postId, username, likeCountElement) {
        // UI update
        toggleLikeUI(button, true);
        likeCountElement.textContent = parseInt(likeCountElement.textContent) + 1;
        
        // API call
        fetch(`/post/anonymous_like/${postId}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ 
                username: username,
                anonymous_id: anonymousId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                likeCountElement.textContent = data.like_count;
                
                // Store like in localStorage
                anonymousLikes.push(postId);
                localStorage.setItem('anonymous_likes', JSON.stringify(anonymousLikes));
            } else {
                // Revert on failure
                toggleLikeUI(button, false);
                likeCountElement.textContent = parseInt(likeCountElement.textContent) - 1;
                
                if (data.error === 'Already liked') {
                    alert('This post has already been liked from this device');
                }
            }
        })
        .catch(error => {
            // Revert on error
            toggleLikeUI(button, false);
            likeCountElement.textContent = parseInt(likeCountElement.textContent) - 1;
        });
    }
    
    // Comment like buttons
    const commentLikeButtons = document.querySelectorAll('.comment-like-button:not([disabled])');
    commentLikeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const liked = this.classList.contains('liked');
            const likeCountElement = this.querySelector('.comment-like-count');
            
            // UI update
            toggleLikeUI(this, !liked);
            likeCountElement.textContent = parseInt(likeCountElement.textContent) + (liked ? -1 : 1);
            
            // API call
            const url = liked ? `/comment/unlike/${commentId}` : `/comment/like/${commentId}`;
            fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    likeCountElement.textContent = data.like_count;
                } else {
                    // Revert on failure
                    toggleLikeUI(this, liked);
                    likeCountElement.textContent = parseInt(likeCountElement.textContent) + (liked ? 1 : -1);
                }
            })
            .catch(error => {
                // Revert on error
                toggleLikeUI(this, liked);
                likeCountElement.textContent = parseInt(likeCountElement.textContent) + (liked ? 1 : -1);
            });
        });
    });
    
    // Author like buttons (admin only)
    const authorLikeButtons = document.querySelectorAll('.author-like-button');
    authorLikeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            
            // API call
            fetch(`/comment/author-like/${commentId}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI based on response
                    if (data.liked_by_author) {
                        this.classList.add('active');
                        addAuthorLikeBadge(this);
                    } else {
                        this.classList.remove('active');
                        removeAuthorLikeBadge(this);
                    }
                }
            });
        });
    });
    
    // Helper function to add author like badge
    function addAuthorLikeBadge(button) {
        const commentAuthor = button.closest('.comment').querySelector('.comment-author');
        if (!commentAuthor.querySelector('.author-liked')) {
            const badge = document.createElement('span');
            badge.classList.add('author-liked');
            badge.setAttribute('title', 'Liked by author');
            badge.innerHTML = '<i class="fas fa-check-circle"></i>';
            commentAuthor.appendChild(badge);
        }
    }
    
    // Helper function to remove author like badge
    function removeAuthorLikeBadge(button) {
        const badge = button.closest('.comment').querySelector('.author-liked');
        if (badge) {
            badge.remove();
        }
    }
}); 