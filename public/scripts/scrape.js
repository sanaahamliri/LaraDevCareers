/ scripts/scrape.js
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
            adElements.forEach((ad, index) => {
                const imageUrl = ad.querySelector('.fotocontainer img')?.src || 'No Image';
                const title = ad.querySelector('.break-word.font-size-h5 span')?.innerText || 'No Title';
                const price = ad.querySelector('.font-semi-bold span')?.innerText || 'No Price';
                const location = ad.querySelector('.text-grey-lighter span')?.innerText || 'No Location';
                const sizeId = `#b17-l1-86_${index}-b1-Oppervlakte2 span`;
                const size = document.querySelector(sizeId)?.innerText || 'No Size';
                const roomsId = `#b17-l1-85_${index}-b1-Kamers2 span`;
                const rooms = document.querySelector(roomsId)?.innerText || 'No Rooms';
                const typeId = `#b17-l1-86_${index}-b1-TypeWoning2 span`;
                const type = document.querySelector(typeId)?.innerText || 'No Type';
                const endDateId = `#b17-l1-86_${index}-b1-EindDatum span`;
                const endDate = document.querySelector(endDateId)?.innerText || 'No End Date';
                ads.push({ imageUrl, title, price, location, rooms, size, type, endDate });
            });
            return ads;
        });

        console.log(JSON.stringify(ads, null, 2));

        await browser.close();
    } catch (error) {
        console.error('Error:', error);
    }
})();