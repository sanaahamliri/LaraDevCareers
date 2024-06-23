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
                const title = ad.querySelector('#b17-l1-86_1-b1-HuisTitel span')?.innerText || 'No Title';
                const price = ad.querySelector('#b17-l1-86_1-b1-Prijs span')?.innerText || 'No Price';
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
