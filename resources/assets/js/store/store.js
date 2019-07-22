var store = {
        debug: true,
        state: {
            message: 'Hello!',
            isVisible: null
        },
        setMessageAction (newValue) {
            if (this.debug) console.log('setMessageAction triggered with', newValue)
            this.state.message = newValue
        },
        clearMessageAction () {
            if (this.debug) console.log('clearMessageAction triggered')
            this.state.message = ''
        },
        toggleIsVisible(commentId)
        {
            if (this.state.isVisible == commentId) {
                this.state.isVisible = null;
            }
            else
            {
                this.state.isVisible = commentId;
            }
        }
    }

export default store;