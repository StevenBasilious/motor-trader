document.addEventListener("DOMContentLoaded", function () {
    let selectedRating = 0;

    // Star Rating Selection
    document.querySelectorAll(".star-rating i").forEach(star => {
        star.addEventListener("click", function () {
            selectedRating = this.getAttribute("data-value");
            document.querySelectorAll(".star-rating i").forEach(s => {
                s.classList.remove("active");
            });
            this.classList.add("active");
            this.previousElementSibling?.classList.add("active");
            this.previousElementSibling?.previousElementSibling?.classList.add("active");
            this.previousElementSibling?.previousElementSibling?.previousElementSibling?.classList.add("active");
            this.previousElementSibling?.previousElementSibling?.previousElementSibling?.previousElementSibling?.classList.add("active");
        });
    });

    // Review Form Submission
    document.getElementById("reviewForm").addEventListener("submit", function (e) {
        e.preventDefault();
        
        let carModel = document.getElementById("carModel").value;
        let reviewText = document.getElementById("reviewText").value;

        if (carModel.trim() === "" || reviewText.trim() === "" || selectedRating === 0) {
            alert("Please fill all fields and select a rating.");
            return;
        }

        let newReview = `
            <div class="review-card">
                <h4>${carModel}</h4>
                <p>"${reviewText}"</p>
                <span>${"⭐".repeat(selectedRating)}</span>
            </div>
        `;

        document.getElementById("reviewsContainer").innerHTML += newReview;

        // Clear the form
        document.getElementById("carModel").value = "";
        document.getElementById("reviewText").value = "";
        selectedRating = 0;
        document.querySelectorAll(".star-rating i").forEach(star => star.classList.remove("active"));
    });
});
