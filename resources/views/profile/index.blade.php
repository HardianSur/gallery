@extends('components.main')

@section('container')
    <div class="py-8 px-4 mx-auto max-w-full lg:py-16 lg:px-4 border-white ">
        <section class="flex justify-center items-center gap-8 mb-6 lg:mb-16 md:grid-cols-2">

            <div class="w-11/12 p-6 flex flex-col items-center justify-center">
                <div class="mb-0">
                    <a href="#">
                        <img class="w-44 h-44 rounded-full"
                            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUSEhIVFRUVFxUXFRUVFxUVFhUWFRUWFxUXFRgYHSggGBolHRUVITEhJikrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGi0lIB8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBIgACEQEDEQH/xAAbAAACAgMBAAAAAAAAAAAAAAADBAUGAAIHAf/EAEIQAAEDAgQDBgQDBQYFBQAAAAEAAhEDIQQFEjFBUXEGEyJhgZEyobHwQsHRFCNScuEHFRYzsvEkYnOiwjRDgoOz/8QAGgEAAgMBAQAAAAAAAAAAAAAAAAECAwQFBv/EACcRAAICAQQCAQMFAAAAAAAAAAABAhEDBBIhMUFRIgUjMhMzQmGB/9oADAMBAAIRAxEAPwDljQitQ2orV0CoKxHYEBiOxSAK1FYENiO1AGwC3a1agLdqYHq9Xoati1AGq8W2lNUMA4yTYcyYH9UpTjFW2NRcuhQBehvJTdDLGgeI+IibbcOM9dgj4XCMYZsXHYHhPEe6yT1+NXXJfHSzfZFYTBEmTYAGZHpbnupR2Ea5vhYIgQSLiLb+vyRMY0BoLbE89i6ePPgo013NjwuIMnVNgJMARebBc/Jq5zlZqhgjFUFfkzA0y+HXtIiw8lD18OWm4TWExzqlTuXUwLSDM3BFibb+QUoK0Q0wBwLS2Dw3G48t1bj1s4upckJaaLXxKw5DcFOVsHTLoLtJnl1jfogVsrI4zyA3J4LfHV45eTLLBNeCEchPTlahFzMfnyCTcFoTvoqaoE5CciuQ3IECcEMoxQnIEDchlEctCgDRer1eIAaaigLRqIFAkEpo7UFgR2qQBWIzUJiKAgArUQIbAihMDYI1Ck55hvryHVaMbNk3q0tgAbGTz5qrLk2RLMcNzCHAQBNyeR9t0SSI1bAcjf7P1UdVzLSNLYnjqJFiBF+aTpPqvqA65IuL9Lx9+q4eXNPJ2+DpQxxj0iZdmGkbSXG3pA4m4u5RNPHVy+W+Gx5GRMj4jwPTgph/ZPEvh4YQDtMC3WeKkMH2He29Vwk7htuVjwAG0KlUWtMrVbHVmmSeuxbx2g/JbUM5dIloLSRLuA23nZXP/DNEWu60XAgdAo7Hdm2UxqDOUkWO90016DY/ZBV82a06XMa294DtYaQZNgAfmsp4pzgWSIu6mQZ8W7tPlbbqpNzGuaNTQ4iwmJF7Ry6pfC4AS7QHNO4BMgbWB8xx5qW5URcGiPzHD04/eEzYyN2usAGxuLuW+IeWgFj7QBO5Ec+Y2UNnlJwqB7pvE8Z4X9E3lGO0iHtJbxtIjyKk1xZX5pk9g6ba9MioRIkahsRz5AiVW8ZhSxxa7cexE2urflbKPx03gj8TDxBAH5EIfaHBAtJaBLDB42O1+v14LVpdQ4S2vplGfEpK0UioEEpiruUFwXYMAFyG5GchOQAJy0KIVoUAeLxerECGmojQhtRWqBIKwIzAhMCYYFIAjQjMKE1GYgAjUVoWrQiNTA3YF7iKw06C8jaBbrcn24br1hUfiMOXOJnTwtc77Rud1g18qhXs1aWNyN8syt2IqCk0a3arwQABzcRwXWOzPZClhjrfD38LWb6cSlexOStw9MEj94+C4kyfIEq3BcZO+TotVweVyDfl925JKqPL76p1wS9ZoCbYooi6tO+9kLEMBsbp6rTlB7gmySLCBqZI0klpLZ4WI+ey2dkjS2JIN7j9FPDDELY4eVNJCcih5nkjgNLrzxgCeIuq9/dpYdiN/CeMbwuvDCBw0uAI+/ZRWa9nHM/eUzLTZzDcdeqdMg2ihZaKbTqa3S7Yjib2PVSlaqXkPnUDLXN6CDI57AjyCzMMvNJ2scd5Fx0PHh6BCpMDtQ4bnhB6HhdJMg0VzNstLJIkgbnr6beahXBdEqMDqQD/AIgS1xHmAZ87e1uaoWLpaXETME+XGxXY0edzW2XaMGoxKLtCbghuCM5CctxmBFaFbuWhSEeLFixMdDLUVhQmorFWMOwozCgsR2KQBmI9MILAmGBABQEQBDCKxqBgcVie7Grjw6qT7HZQa1VtarcCHtHnwJ/TyUHnTZNNg/ETJ+X5roPZiADyEewAAHyXE+oTbnR0tHH42XDBs4otbH0qfxPCr2MxtZwhkNHAz9yqxi8K8kk1C4nfZYk/Rr22+S+nPKR+EobsxaVznxMO5KkMFjS6yHZNY0XJuMC2diwVAjUBKjcbj3CwJQmG0u9HEcymWOBXMmY6uT4X+ilsHmWKaJc3V0N1NMhKBfWU02BLSDsVXsoz0OgP9Z3BU+82BGxVkX5M8k7pkNm2RCoxzTfULbeE8L7qgDLgy/FtiD/y8fL0XVHVPmqL2uwJa81qZ07Tyvqk+kD0lKS9Am/JDGoHhzdUOmW+fD6fd1Ve0lECoHDZzQbcDHiHvKsbKwNQRE3nb0dE7gzPVQnaZ+rTeYAAtG4n5LVon9wo1H4FcehORXobl2jngitCiFDKBHixerEAMNRWhCajsKgSCNCYpoLUZiYB2I7EBiYpoGFYEdgQmozUAQuYvP7Q2BYAH5rovZsf8OXcSYP5rmudP01h5gfXgum9n2f8C10blzvfZcHWL5s6ulfxK72u7SmnLGTAtb8R6qJ7PYyrjC6KYlkHw1HgkSRa5BUnW7POru7yo/QwTGpp8U8riQLJ3JMHTwkiiAZ4hsT81VDZXPZfJZN3x6FHVHsdoeHTEhrwA+OYIs4dFM9mMtdWrcmNGpx+g6m/sUvi8L3zhrYXOmGgc/Lkr5lWXihhw38TjLz58h02UOyyTqvZGYxgEtCrGeUjTGo7K351gDS0vF2vHsRw+/NQWctFSkWGQDaRuE0q4ZC7qjnuI7Rua6G2HST9YCsmBzWs0Nc+WtdEOe3wGdvG0nT7Ku4rsqdTQ2p8JJvImedjJj81fcNPctpQXNaALiZgAX57K2oNcMrcsilyuBjA45tU6XANeNxvY8QRuOitGUV3DwOuOC5qzB1KL/hcGg6qZII8JMOZJ4W94XQMorawHDeB/VQXZLIlRIYw6QSqB2wzaRo4EDpuN/ddCxzZpu/lP0XF8/rnvCHCYtB8729k32VeAbakEPk+guTHHl1/VeZ4yWNeLg7fp1SeErmdLQDI+Enkfkfvipio5r8LOmCJmx84+sK7BLbkTKsiuDKi4ITkxVqTwhAeV3jmAnLQhblaFAjWF6sXqADtRWoTUZigSCsR2IDEzTCYBqaYYUFiPTCBhWhHY1DYEzRZJA5kD3QBC57QlzD539LrtHZzLQMPSaRswSPM3P1VHxXZ2m+nSrMxDX6agD2QReYj3XRadfSABwsuDqckZ5G10dXDjnCNNUw2Kw1PTDmNIG0gGOllBYnCF5/dsjz8lP0/FujFzWiyoassUnEiMvyoMIG7zueXRPYlwENHBVjtD2tbRfop3fsfJR2A7SaiSbncgqMWi1wl2zoWPptqUYcLRbyIVOrYaJadvu6ncoz2lWboLgD5oGLEOLHQY2PMHirJNPlFUE42mQH7IAbhO4bBtO36H3CZdRHBeUmEGyCxuyZw+WMfT0PAc3z3HmDwQ8BlHckgEkcJRMFXMKQ1qzgzvcgNZvhPQ/RcX7UhoqOlstdpLYgHYAgTO1zEea7RXcNJ6H6Lj/ay7w4AOlrg5rtiGkn0IJMdVF9i8EHh8Q17toeJh0aNTeTgDpLvZS2HZZw1Bwc020xciIJ25hVkYxhGqNMHwxvteJKfFYmBqERcCxHInmFOK5It8EXjaRa4gj75hKOT+Oq6zJ+IWPn59Ui5d+PRzH2CctCiELQpkTWF6sWICxhoRWoLUZoUCQZiOwoDEdgTAZppimgUwjsQMZphN4X4m9R9UrTTWHMOB8wlP8WShW5WDyGo/vvDJaXgkbj4hBPuuo0lQ+yo7lz9W7qopj6k/MK+0eC8unZ6TU/uNjjHQlMXUcfCNymCVqKgbwkqRm6OT9teyVUVy/xljvE1zRMEm4J4EFCwWR1i4B0gFsFxMEyIm3FdSzDHU6d6rrnZguf6KDrVqLocyoDfbYhLxRbuk+aKX/gqpQd3tHFPsQSzSb8xY/kr9h6rzTZ3k6g0AzY7k/mmstqwNTDI4xuOqcxL21Bex5qTt8kN1LbRHU6yZYUNlCDdM0mShWJ0M0k13lkpTCNKsKmaZjVim8j+E/RcsdS71rnEmzrRFy43j0XUKpBkcNj6qoVctpUa1OjUqBoJ8BPE6Zvy4BQk6JwhudCwoYbDU9OHw9N7wI1VGh4bzku36Ks59SA0YhtNrC/Uyoxohkt2LW/hkO2HJdHxGRsZSOk7ReZmeZ4qndqcKP2V0fgqMd6ODmH5lqt07+9G/LJ5oxenltXK5KJVQXIz0Ir0Z54EQtCiOWhQI1hYsWIAM1HYEBiO0qskGYEdiCxHYmAwxMUwgU0xTTGMU0wxAplMU0AT2DwbqgoVWizKh7z9SrfSKqvZ2qyC1xIcHS2DEyIg8wrLTK85qYbMskdvFkc8UW/CDYrEaWyqfnXac0nANBc91mtAJJPCALnop/GnW4M9fIIlOlToAubd5F3cY5DyVKaJrs59iskzepNU0Ym57x7Wu9pkdDdIf3dmdOA6hEHfVY7WVqxmeVA46XR6pZmf1HEBxKsTXo0bn7EcLmOOw5FSrQe1vFw8TTzmNlZMtz2nWALXC/CUehjC5habtcLifX6pX/D9AnW1umpvqFievNJtFU2n2WHCVpN05x8lD4GQ4eym2pxdlMuDFstTwW8/f6KRBsDF1Uu12UftDu+BdqptAHKAZ/P5K4MAJNpsbc+iUxJboI+AwRLtj6qMq8l2FuLtEJ2fxBfQexxNgB8woDtfiG0qL2firFoaOOhhkk9TCsZNPDUH1HGQLkj8R/C1vmSuXZrjX16jqjzc8OAA2A8gtOg07nJSfUSOu1KgpQj/ACI9wQnIrkNy7xwQLlrC2ctSgR4vF6sTAKxGagNR2KokHYmGJemExTTAYppmmEu1MUkxjDAmKYQqbUywIAPg3Q9p5OH1VzZVsqW1TFLH2E7/AFXK+pQ/Gf8Ahv0Uu4ko2pclKYjW/bZe4esHGLbfVTOCLGC8FcmjoXRVq2UniOkpankZmR9VdMZmDYgQVGCqwmxHTkpjUhXC4QtABTTHQmGCUGtSMoaIuRjHXlTOGqAgHqFEUgnKNXSAnDghIkAZWVKtrJUVlpUqTAVpXRDZjnzqVcwDoptaXu4NdUJgHlYD3W2J7d4QtuBUPADxf0Cr3b6m6lhnz8eJrtnyaxth/wBg91UaGG0AdNr8YPHirsGn/UkLNqNkaS5RM9pe0D8SQI002/Cwc+Z81Xnph6A5dyEIwjticmc3J2wD0JyM5BepkQbloVuVoUCPFixYgArUViExGaFWSDU0zTSzEzTTAZppikl6aapIAYplM07pdgTmEs4dUpOk2NK3Q23L3xMAdSvMZhHfszqrB4mO4cWwJUzi6X7qQY+5Uf2XzJr21aBMua5xI5tfcfWFxNRqZzhTOngwxUrRXMBnsOnhbqpXFdoNVgfvkoHtVkxovNWn8BN/IqCZiyfIrMoqStGlycXyXqhmZi5+aLSx17FUduMcOKPSzQgyntDedAoZkU0MxkbqjU8wLrzvwUnh3ki5UbB0ywNxpKPQxB23+7KIogSpfBNHIIQmiQo6o2TdGlxXlGmE3TCsIFK/tHeDUosN9DXOjzdYH5FUx4Vj7Z19eKf/AMoa32bJ+ZKrr13NLjUca/s5meW6bFnhBejvQHrSUAnITgiOKG5AAitCiOQygR5CxYsQARhRmlAajMVZIPTTNNLU0zTTAZppumlKaapIAbpoGIzenTq06Vy97mNAHDU4AEnhujsULk+Wmrm3iHhYO99GtaG8I3I35FU55uEbROCtnT8UYpCTAuSZj8lyzMc3dhsc2sB8TAHD+ITc2ttHsul5xXb3YEjnEnzIu2I4XXMs7wQq1HDkbG2/HZclRvs3bq6L/VxLarJEOa5u9iII4rn+d5V3bjAOk3B5eSP2UzN1InDvMXls/MdOIU3mZD2325jn9QsdPHI3qpxKR3pb8XuiNeCnK+GuRHVR9TBOb8NwtCaZS4tDdGuW7KQw+aFROAy+pVMCw4k7BW7K+y7Rd5Lz7BRlSHFNhcuruKs+VzZDwOVNFgIU7hcMGiFWuSUuBjDusmQgMCzMXxSdeJEA+brD5lWIrfBy/MaveVHv/ic4+hNlH1ApjNMrfR3u3g4bevIqIqL0UHFxW3o48rvkXel3hHqIDlMiBchORnoLkwBOWhRStCkI0WLaFiYHrUZiC1GYqiQemmGJUPA3Kx+Na3a5UZZIrtjSZKU0T9qY3dwHr+SrmKzF7yTNjeB5pXXzVEtT6RPYW4ZzQG7/AJFT3Y8tq99iG0yDIpteQJc1kklpdAF3Ab7jyXMgwuc1oGouIDW83GwHuQusZfQoYZlPD66ZLLkeJzi6dT3abASdpngs2bPKSpluKCuwmfVwC0EEuAN9QmBE+EGD/RVjCHUSXXvy+s7bIuOxgeTpawAEy0OMg897biy8wwIbMG55/cqqK4LJMRz3KdQNWnZ7LmOLRvHmFrgceXtE77O2/wB1OYCvYwdyLgEx5Rw9EZuX0mP1NYPFfmJ4xIEj0VGaPBp08uaIP+7n1D4GH2t7pijkbhepby4e6teGdaFtUprPybCsOw4b8Ph+YU1lWJ4fQpfF4UHaxSVFr2m0H1j5FAUXPBunYffVSFMnj8rqCyl7juAOqsFFnT0UkVSQelT/ANzdVrt5mAptpsgmTrOncBm3zI9laadlSMTmdOviqgJBa092J2lvxR6zsrI9lc+hTKs28Oh+l9M/GX+ezQ2OSSzzJ+7He05NN3CDLJ2ny81N4zIg397QJaR8TbkO5AyV5l+LBaZaGgyHtql3SAbj5rXhyvG7XRjnBSRRHlBcpvtDlndO1MvSfdhBkDm2fuyhHLsQkpK0YmqdMC9CcEZyE5SECchlFchkIEaysXsLEAa95H39VhrfYSj3dUF7yuS5yl2y/hDnerR1RKd8ti8KA7NzUWmtY6DJCE61/uyALD2axTaGvFvbPdgtojw+Ks4C4m/haZnzCay/tPqc7vWDW+f3wLi6fwh0mCB6KFwOPaSxtVodTptd+6B0a5mXa7w+SDccAEmacjU24vbct8j93hKvZLdXRenPLyASCeYESPX6JyJ2bIbvDSSDFoVXyHO+4c0uHeU9jMl9Ppe4tsr7QqUazG1KbtbS6zmnS9h5SCDFzYzwsUiadkVg6TnVGgk2My06Xgfy8VPuZ3jC9rg7SNRF21AeT2ncxN7KLxMtqF+klsAB7Ie7mSRcyN/sqcybEEtOo63C5cNIdHAkfqAoyVk4va7FMM+U+2CLqsZln1DDV6lF4e3SQQQ2Ww4BwiCTxTmD7RYZ/wANdg8nEsP/AHALK8cl4NyzQfkla1GUsMPBRm4lrtnNIPFpDvoiMqfeyjRYn6GMI2FM0tv91FUDKk6ZhsoRGQl2jzluGw1WqTdrTHm42aPchct7BYx8OJEw4y4nibkk+pUh/ahm+sNoNNpl3UbT0SvZHCOp0g5pu4lzgGl5DTHAEXgb+a0QXxMmSXzr0jomDxUtlskWtAueJE7hIZrTFJ/fsED/ANxsPEj04i9ysw0iHQ4SQCHVAInm0gSJHOeXkzTo+F1OHwJIJ8er1JM7n5KyiryIYtrcRSdS1aqgbrpS0CQXHTDgSPLhvcKjVGkEg2IsQeBG4Vyyuo9pNM/tB7syCwgywnaHWI6X5KJ7YYQtqiqGkNqAXgjxDeQRIMQb+a26TJT2MozR4srj0JyK5CcugZwZWhWzlqUCPFixYgCPdTPktCOCD33JbDE8Psrjl5pVpwUMFOMc0iD/ALJetRLSgDwP2WPetIWAoA1cF7TqFpkGD97rHiFogCRo4gP28LuXA9P0Ullma1KDi5mkGIIM6X3tsRDhwKriapYv8L7jnxHXmih2X3DZ8yuAx5dTqWNwNJP4ucg33+SmMtxWmrqd3ZDbNqA3vNvDt9FzLVt+JvAzt0Km8j7QVaMeIuZMn+IC4IMXjzuotE1P2SX9pmAP7SysIAq0xO93MsTJEbFvsqiaT27tMc+HoRYrquPo08YxmggOGrTuNUgEieW2/FQx7POGzOukgGfOLppkZLko1CqRdpgqTwWZ1mODhVde5AcTxIgg24fMc1PuyRodFTUOrWuPzBK2f2fDh+7bTeeAvRf53bLD6tTEuBbAds8U0mdDwOBaB82wrRS7YuqUyHU9BgQWkncxsdvdVirkT6YLnU6jBHxODajPV9K7R5liK6hWZTLhSc4QIc0hzDyOoWjqoPHF+CxZZryVvPqmrEadwHbeQP8ARXDLDMFtogkWEW3JJnTfgFScXRLKjHOuS65FwJm3n1V4ykH4qZiGkyNJPWOZ5+SUlXRKDu2ycoVKbWl2qkG7VBw2uL2Ivy4jdGaWs+EUwW/AGvPwB25BsTbziIlGwnePOoNq/hGmabYHEnTdMjLjMGpdu58IdH8Lo/ogZDZvTaC3EtEtiHQX/CeMAiee/RN1sG3EUDREm2qm4vL4cDtDjqjhx3UuzLQ5mjUHNcLXadxwixHRQ2WYCvQc6k5h0z+7cAC3eT5TPAwmm07QVfBzuq0ixsRYg8CNwguVj7c4UU6wqbCqNRGxDh8RiZg2Pqq3M7LrY8sZrgxyi0zRy0K3ctCrSBqvVixMCvO4dFszYrFi4xeGppups1YsSGIH81gXixMQR+x9EusWIAxYFixADuA+F/oj4P4//j+YXixJjLX2I/8AUt/lq/8A6Ul0LGfG7oPosWJEvArmKFhf1+i9WJkSVwPw/fJcrxe9b/qO/wBSxYpLsT6Esz+H1H1Vm7I/kV4sUJFkC65l/kM/+v6p+j/mu/kZ/wCSxYoFgoP8vD/9Rn0cpHL/APMf/O7/AEsWLEIGVb+03/LHRv8ArXN6SxYrcfaKshu5aFYsXZMposWLFED/2Q=="
                            alt="Jese Leos">
                    </a>
                </div>
                <div class="mt-1">
                    <h1 class="text-3xl font-bold">{{ auth()->user()->name }}</h1>
                </div>
                <div class="mt-3">
                    <h3 class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="size-5 bg-slate-200 rounded">
                            <path fill-rule="evenodd"
                                d="M2.75 4a.75.75 0 0 1 .75.75v4.5h5v-4.5a.75.75 0 0 1 1.5 0v10.5a.75.75 0 0 1-1.5 0v-4.5h-5v4.5a.75.75 0 0 1-1.5 0V4.75A.75.75 0 0 1 2.75 4ZM13 8.75a.75.75 0 0 1 .75-.75h1.75a.75.75 0 0 1 .75.75v5.75h1a.75.75 0 0 1 0 1.5h-3.5a.75.75 0 0 1 0-1.5h1v-5h-1a.75.75 0 0 1-.75-.75Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">{{ auth()->user()->username }}</span>
                    </h3>
                </div>
                <div class="mt-2">
                    <button data-modal-target="update-modal" data-modal-toggle="update-modal"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                        Edit Profile
                    </button>
                </div>
            </div>
        </section>

        <section id="buttonContainer" class="flex justify-center gap-2 mb-11">
            <button
                class="w-fit px-2 py-2 text-slate-600 hover:text-black  hover:border-b-2 hover:border-black font-medium text-xl "
                id="foto-button">Foto</button>
            <button class="w-fit px-2 py-2 text-black border-b-2 border-black font-medium text-xl "
                id="album-button">Album</button>
        </section>

        <section id="main-section">
            <div class="grid grid-cols-2 gap-2 mx-6 mb-3 max-w-fit">
                <div>
                    <button class="bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium">Filter</button>
                </div>
                <div>
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z"
                                clip-rule="evenodd" />
                        </svg>

                    </button>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mx-6" id="card-container">

                <div
                    class="w-36 max-h-52 md:w-44 md:max-h-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg w-full"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQB4sYLadZlYBjysS4PHq5-8p-EQHj9qeYxxQ&s"
                            alt="" />
                    </a>
                    <div class="p-2">
                        <a href="#">
                            <h5 class="mb-2 text-sm font-semibold tracking-tight text-gray-900 dark:text-white">Noteworthy
                                technology acquisitions 2021</h5>
                        </a>
                        <a href="#"
                            class="inline-flex items-end text-xs font-medium text-end text-black me-0 mt-auto">
                            See more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        @include('profile.modal')

    </div>

    <script>
        $(document).ready(function() {
            loadCards();


            $('#buttonContainer button').click(function() {
                $('#buttonContainer button').addClass('text-slate-600');
                $('#buttonContainer button').removeClass('text-black border-b-2 border-black');

                $(this).removeClass('text-slate-600');
                $(this).addClass('text-black border-b-2 border-black');
            });


            $('.form').on("submit", function(e) {
                e.preventDefault();

                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    url: "{{ url('album/') }}",
                    data: {
                        name: $('#name').val(),
                        description: $('#description').val(),
                        _token: token
                    },
                    dataType: "json",
                    success: function(response) {
                        loadCards();
                        alert('Berhasil menambah album');

                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseJSON);
                        console.log("Terjadi error:", xhr);
                    }
                })
            });

            $('.form-update').on("submit", function(e) {
                e.preventDefault();

                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "PUT",
                    url: "{{ url('profile/') }}" + "/{{ auth()->user()->id }}",
                    data: {
                        name: $('#name').val(),
                        username: $('#username').val(),
                        emial: $('#emial').val(),
                        alamat: $('#alamat').val(),
                        _token: token
                    },
                    dataType: "json",
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseJSON);
                        // console.log("Terjadi error:", xhr);
                    }
                })
            });

            function loadCards() {
                $.ajax({
                    url: "{{ url('album/retrieve') }}",
                    method: 'GET',
                    success: function(response) {
                        if (response) {
                            var cardContainer = $('#card-container');
                            cardContainer.empty();

                            response.data.forEach(function(card) {
                                var cardHtml = `
                        <div class="w-36 max-h-52 md:w-44 md:max-h-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card-item">
                            <a href="#">
                                <img class="rounded-t-lg w-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQB4sYLadZlYBjysS4PHq5-8p-EQHj9qeYxxQ&s" alt="" />
                            </a>
                            <div class="p-2">
                                <a href="#">
                                    <h5 class="mb-2 text-sm font-semibold tracking-tight text-gray-900 dark:text-white">${card.name}</h5>
                                </a>
                                <a href="#" class="inline-flex items-end text-xs font-medium text-end text-black me-0 mt-auto">
                                    See more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    `;
                                //             // Menambahkan card baru ke dalam container
                                cardContainer.append(cardHtml);
                            });
                        } else {
                            console.log("No cards available or error with data.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            }

        });
    </script>
@endsection
