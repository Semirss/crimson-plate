function showCategory(category) {
    const sections = document.querySelectorAll('.menu-section');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    const activeSection = document.getElementById(category);
    if (activeSection) {
        activeSection.style.display = 'block';
        let special=documument.getElementByClassName("specials");
        special.activeSection.style.display ='block';

    }
}
