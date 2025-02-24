// Replace 'yourusername' with your actual Treehouse username
/* jshint esversion: 8 */
const apiUrl = 'https://teamtreehouse.com/kieronoates2.json';

// Function to fetch and display Treehouse points
async function displayTreehousePoints() {
  try {
    const response = await fetch(apiUrl);
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    const data = await response.json();
    const totalPoints = data.points.total;

    // Update your HTML element with the fetched points
    document.getElementById('treehouse-points').textContent = `Treehouse Score: ${totalPoints}`;
  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
  }
}

// Call the function to display points
displayTreehousePoints();
