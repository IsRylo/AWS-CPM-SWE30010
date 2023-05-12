import Header from "./Header";

function LandingPage(handleTitleChange) {

    return(
        <>
        <Header handleTitleChange={handleTitleChange}/>
        <section id={"main-section"}>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci quos, molestias alias quisquam, error laboriosam neque sed dignissimos voluptatibus fuga repellendus accusamus quae voluptatem inventore veniam quo officia assumenda numquam?</p>
        </section>
        </>
    );
}

export default LandingPage;