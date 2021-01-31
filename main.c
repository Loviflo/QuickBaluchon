#include <stdbool.h>
#include <stddef.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
// #include <curl/curl.h>
// #include <curl/easy.h>
#include <fcntl.h>

#include "qrcodegen.c"


// Function prototypes
static void QRCode(char *url);
static void printQR(const uint8_t qrcode[]);


// The main application program.
int main(void) {
	char *url = "https://google.com";
	// printf("Tapez votre URL");
	// scanf("%c",url);
//   CURL *curl;
//   CURLcode res;

//   curl = curl_easy_init();
//   if(curl) {
//     curl_easy_setopt(curl, CURLOPT_URL, "https://google.com");
//     /* example.com is redirected, so we tell libcurl to follow redirection */
//     curl_easy_setopt(curl, CURLOPT_FOLLOWLOCATION, 1L);

//     /* Perform the request, res will get the return code */
//     res = curl_easy_perform(curl);
//     /* Check for errors */
//     if(res != CURLE_OK)
//       fprintf(stderr, "curl_easy_perform() failed: %s\n",
//               curl_easy_strerror(res));

//     /* always cleanup */
//     curl_easy_cleanup(curl);
//   }
	QRCode(url);
	return 0;
}



/*---- Demo suite ----*/

// Creates a single QR Code, then prints it to the console.
static void QRCode(char *url) {
	const char *text = url;                // User-supplied text
	enum qrcodegen_Ecc errCorLvl = qrcodegen_Ecc_LOW;  // Error correction level

	// Make and print the QR Code symbol
	uint8_t qrcode[qrcodegen_BUFFER_LEN_MAX];
	uint8_t tempBuffer[qrcodegen_BUFFER_LEN_MAX];
	bool ok = qrcodegen_encodeText(text, tempBuffer, qrcode, errCorLvl,
		qrcodegen_VERSION_MIN, qrcodegen_VERSION_MAX, qrcodegen_Mask_AUTO, true);
	if (ok)
		printQR(qrcode);
}

/*---- Utilities ----*/

// Prints the given QR Code to the console.
static void printQR(const uint8_t qrcode[]) {
	int size = qrcodegen_getSize(qrcode);
	int border = 4;
	for (int y = -border; y < size + border; y++) {
		for (int x = -border; x < size + border; x++) {
			fputs((qrcodegen_getModule(qrcode, x, y) ? "**" : "  "), stdout);
		}
		fputs("\n", stdout);
	}
	fputs("\n", stdout);
}
