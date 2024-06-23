// scripts/scrape.js
import puppeteer from 'puppeteer';

(async () => {
    try {
        const browser = await puppeteer.launch();
        const page = await browser.newPage();
        await page.goto('https://amsterdam.mijndak.nl/Woningaanbod', { waitUntil: 'networkidle2' });

        console.log('Page loaded');

        const ads = await page.evaluate(() => {
            const adElements = document.querySelectorAll('.advertentiecontainer');
            let ads = [];
            adElements.forEach(ad => {
                const imageUrl = ad.querySelector('.fotocontainer img')?.src || 'No Image';
                const title = ad.querySelector('.break-word.font-size-h5')?.innerText || 'No Title';
                const price = ad.querySelector('.font-semi-bold')?.innerText || 'No Price';
                ads.push({ imageUrl, title, price });
            });
            return ads;
        });

        console.log(JSON.stringify(ads, null, 2));

        await browser.close();
    } catch (error) {
        console.error('Error:', error);
    }
})();
