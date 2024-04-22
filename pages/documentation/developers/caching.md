<!-- pagetitle:Caching Pages -->
<!-- pagelayout:page -->
<!-- pagedate: -->
<!-- pageimage: --> 
<!-- pageexcerpt:Caching massively speeds up your website by serving up static html files. -->
<!-- pagekeywords: -->
<!-- pageauthor:Scary le Poo -->
<!-- pagetype:website -->

**Understanding Caching:**

At its core, caching involves the temporary storage of web data for future use. When you visit a webpage, your browser retrieves various elements such as images, text, scripts, and stylesheets from the server where the website is hosted. These elements are then rendered to display the webpage on your screen. However, fetching data from a remote server every time you revisit the same webpage can be inefficient and time-consuming.

This is where caching steps in. Instead of fetching all the elements anew, your browser stores certain components of the webpage locally, either in memory or on your device's storage. The next time you visit the same webpage, instead of retrieving everything from scratch, your browser first checks if it already has the required data cached. If it does, it can quickly load the page using the locally stored resources, significantly reducing loading times and improving overall performance.

**Types of Caching:**

Caching can occur at various levels within the web architecture:

1. **Browser Cache:** Your web browser maintains its own cache, storing elements of recently visited webpages locally. This allows for quicker loading times when revisiting those pages.

2. **Proxy Cache:** Intermediate servers known as proxies can cache web content on behalf of multiple clients. This reduces the load on the origin server and accelerates content delivery to users.

3. **Content Delivery Network (CDN) Cache:** CDNs are distributed networks of servers strategically located around the world. They cache copies of web content and deliver them to users based on their geographical proximity, further optimizing speed and reliability.

4. **Server Cache:** Websites themselves can implement caching mechanisms on their servers, storing frequently accessed data to speed up response times for subsequent requests.

**The Importance of Caching:**

Caching holds immense significance in the realm of web browsing for several reasons:

1. **Enhanced Performance:** By storing frequently accessed data locally, caching reduces the need for repeated requests to remote servers, leading to faster loading times and smoother browsing experiences.

2. **Bandwidth Conservation:** Caching minimizes the consumption of network bandwidth by reducing the volume of data that needs to be transferred between the client and the server. This is particularly beneficial for users with limited bandwidth or those accessing the internet over mobile networks.

3. **Improved Scalability:** Caching helps alleviate the load on origin servers by serving cached content from intermediary sources such as proxies or CDNs. This scalability is crucial for handling high volumes of traffic without compromising performance.

4. **Reliability and Resilience:** By distributing cached content across multiple servers and locations, caching enhances the reliability and resilience of web services. Even if one server goes down, users can still access cached content from alternative sources.

5. **Better User Experience:** Ultimately, caching contributes to a better overall user experience by reducing latency, minimizing page load times, and ensuring smoother navigation across websites.

**Conclusion:**

In the fast-paced world of the internet, where every second counts, caching emerges as a fundamental tool for optimizing web performance. By storing and serving content locally, caching accelerates data delivery, conserves bandwidth, and enhances the reliability of online services. Whether it's speeding up page load times, conserving network resources, or ensuring seamless scalability, caching plays a vital role in shaping the way we interact with the web, making our online experiences faster, smoother, and more efficient.

## TL;DR

The Skeleton Website Framework uses type 4, Server Caching. It creates an html page for every page and serves that upon page visits. It is (by default) rebuilt every 5 hours. You can enable and disable caching by editing the top of `/index.php`. You can change how often the cache is rebuilt in `/required/top-cache.php`.