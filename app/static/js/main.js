document.addEventListener('DOMContentLoaded', () => {
    // ページの読み込みが完了したら実行
    console.log('DOM読込完了');
    document.querySelector("input[type='submit']").addEventListener('click', () => {
        console.log('クリックされました!');
        const positionX = window.scrollX;
        const positionY = window.scrollY;
        console.log(`X: ${positionX}, Y: ${positionY}`);
        alert(positionX, positionY);
    });
    document.querySelector("value") = `${positionX},${positionY}`;
    window.scrollTo(100, 400);
});
