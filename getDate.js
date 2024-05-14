function getSaturdaysBetweenDates(startDate, endDate) {
    const saturdays = [];
    let currentDate = new Date(startDate);
    while (currentDate <= endDate) {
        if (currentDate.getDay() === 6) {
            saturdays.push(currentDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }));
        }
        currentDate.setDate(currentDate.getDate() + 1); 
    }
    return saturdays;
}

const startDate = new Date(2024, 7, ); 
const endDate = new Date(2025, 6, 31); 
const saturdays = getSaturdaysBetweenDates(startDate, endDate);

document.write("<th>" + saturdays.join("</th><th>") + "</th>");
