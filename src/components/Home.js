import {Container} from "react-bootstrap";
/*import vector from "../assets/img/vector.jpg"*/

export const Home = ()=>{
    return(
        <section className="home">
            <Container>
                <div className="d-flex">
                    <div className="wrap-text">
                        <span className="tagline">Welcome to our website</span>
                        <h1>Hi! We are</h1>
                        <p>Pelabuhan Perikanan adalah tempat yang terdiri atas daratan dan perairan di sekitarnya dengan batas-batas tertentu sebagai tempat kegiatan pemerintahan dan kegiatan sistem bisnis perikanan yang digunakan sebagai tempat kapal perikanan bersandar, berlabuh, dan/atau bongkar muat ikan yang dilengkapi dengan fasilitas keselamatan pelayaran dan kegiatan penunjang perikanan</p>
                    </div>
                    {/*<div className="image">
                        <img src={vector} />
    </div>*/}
                </div>
            </Container>
        </section>
    )
}

