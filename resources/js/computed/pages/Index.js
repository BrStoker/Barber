export default{

    modalShown(){
        return this.$store.state.data.app.modals.isModalShown ? 'layout_modal-active' : ''
    }


}
